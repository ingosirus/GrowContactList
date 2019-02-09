# GrowContactList
Allows anyone to build contact list automatically from a Wordpress Ninja Contact Form with a List created on Constant Contact.
#
#Implementation Steps:
0) Create an email for the website administrator and ensure that email is managed by your webhosting. We will use it to speak with constant contact.
1) Create a Ninja contact form for the website with the fields that matters to you. As an example we have in this case the following fields: Name, Email, CellPhoneNumber, Message.
2) Activate the "email Admin" functionality and ensure the body of the message has all the relevant fields we mentioned in previous step.
3) Go to your favorite Hosting Provider (We recommend Siteground for it professional hosting services - i have been with them for more than 10 years.).
4) Create an email forward action fron the Web Hosting account and set a destination the php script called render_forward.php in this rep.
The path for the php script should follow this structure: /home/accountname/public_html/pathtophpscript
5) On your server, same directory where the php script is located, create a new directory called "ConstantContact". Upload the zip file "cc.zip" and "phpemail.zip".
6) Unzip cc.zip and rename it to "ccccc
