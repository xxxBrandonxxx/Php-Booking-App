<?php
include __DIR__ . "../../processes/config.php";
include __DIR__ . "/../model/apartments.php";

class Booking
{

    //fields

    private $customer_id;
    private $booking_id;
    private $hotel_id;
    private $checkin_date;
    private $checkout_date;

    public function __construct($booking_id,)
    {
        global $connect;
        $sql = "SELECT * FROM bookings WHERE booking_id = $booking_id";
        $result = $connect->query($sql);
        $booking = $result->fetch_assoc();
        $this->booking_id = $booking['booking_id'];
        $this->customer_id = $booking['customer_id'];
        $this->hotel_id = $booking['hotel_id'];
        $this->checkin_date = $booking['checkin_date'];
        $this->checkout_date = $booking['checkout_date'];
    }
    //methods
    public static function createBooking()
    {
        $userId = $_SESSION['LoggedInUser']['id'];
        $hotelId = $_POST['hotelId'];
        $checkInDate = $_POST['checkIn'];
        $checkOutDate = $_POST['checkOut'];
        // insert into database
        global $connect;
        $sql = "INSERT INTO bookings (customer_id, hotel_id, checkin_date, 
        checkout_date) VALUES ('$userId', '$hotelId', '$checkInDate', '$checkOutDate')";
        if ($connect->query($sql) === TRUE) {
            echo "Booking created successfully";
            // Close connection
            mysqli_close($connect);
            header("Location: ../view-bookings.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;

            // Close connection
            mysqli_close($connect);

            header("Location: ../index.php");
            exit();
        }
    }

    public static function showBookings()
    {

        $userId = $_SESSION['LoggedInUser']['id'];
        global $connect;
        $sql = "SELECT * FROM bookings JOIN hotels ON bookings.hotel_id = hotels.id WHERE bookings.customer_id = $userId";
        $result = $connect->query($sql);

        if ($result) {

            echo '
            <div class="table-responsive m-5">
                <table class="table table-hover table-responsive-md">
                <thead>
                <tr>
                    <th>Booking No</th>
                    <th>Place Name</th>
                    <th>Check In Date</th>
                    <th>Check Out Date</th>
                    <th>Total Paid</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">';

            while ($row = $result->fetch_assoc()) {
                $hotel = new Hotel($row["id"]);
                $booking = new Booking($row["booking_id"]);
                $numDays = self::calculateNumDays($booking->checkin_date, $booking->checkout_date);
                echo '
                <tr>
                    <td>' . $booking->booking_id . '</td>
                    <td>' . $hotel->name . '</td>
                    <td>' . $booking->checkin_date . '</td>
                    <td>' . $booking->checkout_date . '</td>
                    <td>R ' . self::calculateCostOfStay($numDays, $hotel->price) . '</td>
                    <td><button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#cancelModal' . $hotel->id . '">
                    Cancel?
                    </button></td>

                    <!-- Modal -->
                    <div class="modal fade" id="cancelModal' . $hotel->id . '" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="./processes/process-cancellation.php" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">' . $hotel->name . '</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="./static/images/hotels/' . $hotel->image . '" height="270" class="card-img-top hotel-image" alt="' . $hotel->name . '">
                                <div>                      
                                    <p class="fs-3">Are you sure you want to cancel?</p>

                                    <p class="fs-6">note there will be no cancelations done <i>48hrs prior to arival</i>.<br><br>
                                    </p>
                                    <p class="fs-5 text-center">Are you sure you\'d like to cancel?</p>
                                    <input type="hidden" name="bookingId" value="' . $booking->booking_id . '">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="confirmCancel" class="btn btn-dark">Yes, please cancel</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </tr>
            </div>
                </tbody>';
            }
            echo '
                </table>
            </div>';

            // Close connection
            mysqli_close($connect);
        } else {

            echo "There was an issue. Please go back one page and try again";

            // Close connection
            mysqli_close($connect);
        }
    }


    // duration of stay calculation
    public static function calculateNumDays($checkin_date, $checkout_date)
    {

        // time calculation
        $diff = strtotime($checkout_date) - strtotime($checkin_date);

        // 1 day = 24 hours in seconds
        $numDays = abs(round($diff / 86400));

        return $numDays;
    }

    // total cost of stay
    public static function calculateCostOfStay($numDays, $price)
    {

        $amount =  $numDays * $price;

        return $amount;
    }

    public static function cancelBooking($booking_id)
    {

        global $connect;
        $booking = new Booking($booking_id);
        $numDays = self::calculateNumDays($booking->checkin_date, 'now');

        if ($numDays > 2) {
            $sql = "DELETE FROM bookings WHERE booking_id = $booking_id";

            if ($connect->query($sql) === TRUE) {

                // Close connection
                mysqli_close($connect);

                header("Location: ../view-bookings.php");
                exit();
            }
        } else {

            echo "Error: <br>" . $connect->error;

            // Close connection
            mysqli_close($connect);

            header("Location: ../failed-cancel.php");
            exit();
        }
    }

//get and setters

    public function getBooking_id()
    {
        return $this->booking_id;
    }

    public function setBooking_id($booking_id)
    {
        $this->booking_id = $booking_id;

        return $this;
    }

    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    public function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    public function getHotel_id()
    {
        return $this->hotel_id;
    }

    public function setHotel_id($hotel_id)
    {
        $this->hotel_id = $hotel_id;

        return $this;
    }

    public function getCheckin_date()
    {
        return $this->checkin_date;
    }

    public function setCheckin_date($checkin_date)
    {
        $this->checkin_date = $checkin_date;

        return $this;
    }

    public function getCheckout_date()
    {
        return $this->checkout_date;
    }

    public function setCheckout_date($checkout_date)
    {
        $this->checkout_date = $checkout_date;

        return $this;
    }
}
