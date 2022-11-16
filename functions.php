<?php

//=======================Objects===================//

//Objects Needed:
//Hotel
//User
//Booking
//So create a class for each

//=================================CLasses========================//

//USERS CLASS:
//First Name : required
//Surname : Required
//Email Address : required


//HOTEL CLASS:
//Hotel Name
//Features pool , bar , kid friendly
// Daily Rate: R350

//BOOKING CLASS:
//required information:
//Chosen Hotel    
//Check in date
//Check out date
//Duration of stay
//total cost of stay: 

//!!! CREATE HOTEL INSTANCES with Hotel CLass BEFOREHAND 4 or 5 different hotels and assign each to a variable



//=================================Page1=======================//

//Function 2: FOrm
//2.1 Fetches form inputs

//--------------------These 3 for user --------------
//First name Required
//Surname: Required
//Email address: Required

//---------------------------These 3 booking ---------------------
//Check in date : required
//Check out date : required
//Compare (button)


//2.2 Number of days must be greater than 0
//2.3 Create instance of user class with information we already have and assign to variable
//2.4 create instance of booking class with information we already have and assign to booking variable


//Function 3 : Calculation
//3.1calculate duration of stay
//3.2 Daily rate should be used to calculate the total cost
//3.3 booking class setter to set duration of stay property
//3.4 booking class setter to set total cost property




//Function 1 : go to Comparison Page
// 1.1 Function 2
// 1.2 Function 3
// 1.3 Page redirect
// 1.4 Function 4
//Function 4 can be called in this function or it can be called once the second page has loaded




//=============================Page2================================/

//Function 4: Display the Hotels
// 4.1 Hotels displayed below each other
// 4.2 Display hotel Information:
// Hotel information:
// the Commodore Hotel    
//Daily Rate of commodore hotel:
//Total of Daily rate :R350
//total for 3 days :1050
//Features:Pool, bar,kid Friendly
//differences in rates as in how much more expensive than the cheapest one
// (book button) -> function 5 called on click



//Function 5 Choose Hotel
//5.1 Fetches chosen hotel name and stores in session variable
//5.2 Redirect to booking page
//5.3 Function 6 called or call when page 3 loads
//5.4 Use booking class setter to set chosen hotel property



//=================================Page 3 ===========================


//Function 6 : Display booking Info
//6.1 Displays booking info using instance of booking class
