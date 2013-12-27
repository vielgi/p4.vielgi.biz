p4.vielgi.biz
=============
I've incorporated my javascript from p3 within the php framework for a fun 
application that calculates free time based on averages that the user inputs via the sliders from jquery ui framework. Then the user selects a plan, and can finally save that as a goal that can be saved and then also shown public.

From this point on the focus is on the admin side of things. The admin user (testing
live application at p4.vielgi.biz can be done with admin@vielgi.biz/123123) can
create/edit/delete plans, users, log items, etc. Here's a more detailed list of functionalities:


Jtable Functionalities (sorting/paging) on following pages

	1. Plans -- only for logged-in admins

			1. create
			2. update
			3. list
			4. delete (removing)


	2. Users (at /users) -- only for logged-in admins

		1. list

	3. Log -- only for logged-in admins (each save in db results in a log add)

		1. list
		2. delete

	4. Goals -- for all logged-in users

Main functionality with javascript on index:

	1. "save goal" but only for authenticated users 
	2. otherwise prompt user to signup, save session
	3. with ajax save
	4. loading only the top five plans (public/active) by created date instead of hard-coding

Misc:

	1. Three user modes: Admin (admin@vielgi.com/123123), Logged-In User Section, un-authenticated
	2. 'update your profile' -- for all logged-in users at p4.vielgi.biz/users/profile
	3. p4.vielgi.biz/users/profile -->'see history of changes' to profile (see db design in table contacts we keep all transactions, but we only display the last updated one when need to reference contact information)
	4. Email on sign-up
	5. HTML5 Validated --  http://validator.w3.org/check?uri=p4.vielgi.biz
	6. My own css validates -- p4.vielgi.biz/css/main.css ( http://jigsaw.w3.org/css-validator/validator?uri=p4.vielgi.biz%2Fcss%2Fmain.css&profile=css3&usermedium=all&warning=1&vextwarning=&lang=en)


