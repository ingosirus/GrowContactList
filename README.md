<h1>Description</h1>
Allows anyone to build contact list automatically from a Wordpress Ninja Contact Form with a List created on Constant Contact.
<p/>
<h1>Manual Installation</h1>
Implementation Steps:<br/>
0) Create an email for the website administrator and ensure that email is managed by your webhosting. We will use it to speak with constant contact.<br/>
1) Create a Ninja contact form for the website with the fields that matters to you. As an example we have in this case the following fields: Name, Email, CellPhoneNumber, Message.<br/>
2) Activate the "email Admin" functionality and ensure the body of the message has all the relevant fields we mentioned in previous step.<br/>
3) Go to your favorite Hosting Provider (We recommend Siteground for it professional hosting services - i have been with them for more than 10 years.).<br/>
4) Create an email forward action fron the Web Hosting account and set a destination the php script called render_forward.php in this rep.
The path for the php script should follow this structure: /home/accountname/public_html/pathtophpscript<br/>
5) On your server, same directory where the php script is located, create a new directory called "ConstantContact". Upload the zip file "cc.zip" and "phpemail.zip".<br/>
6) Unzip cc.zip and keep the name as cc.
<p/>
<h1>Usage</h1>
<br/>
Customize the following php files to fit your needs:<br/>
1) File parsing the email coming from the server: email_to_php.php<br/>
2) File that speaks to constant contact service: linktolist-act.php<br/>
3) File that message the company/website owner: sendmail-to-recep.php<br/>

<p/>
<h1>Requirements / Pre-Requisites</h1>
<br/>
1) You will need to create a API key and Access Token for your client at: https://constantcontact.mashery.com<br/>
2) You need to check that Curl extension for PHP is activated on your webserver<br/>
3) This solutions applies only to Ninja Contact Forms according to the fields definition used above<br/>
4) Ensure the body of the message when configuring the contact form appears as follows:
<br/>
beginMe<br/>
{field:all_fields}<br/>
endMe
<br/>

