# Description
Allows anyone to grow a contact list automatically from a Wordpress Ninja Contact Form published on a website with a List created on Constant Contact Email Marketing Service.


# Manual Installation
Implementation Steps: 

0) Create an email for the website administrator and ensure that email is managed by your web hosting. We will use it to speak with constant contact.  

1) Create a Ninja contact form for the website with the fields that matters to you. As an example we have in this case the following fields: Name, Email, CellPhoneNumber, Message.  

2) Activate the "email Admin" functionality and ensure the body of the message has all the relevant fields we mentioned in previous step.  

3) Go to your favorite Hosting Provider (We recommend <a href="https://www.siteground.com/?referrer_id=6923457" target="_blank">Siteground</a> for its professional hosting services - i have been with them for more than 10 years.).  

4) Create an email forward action fron the Web Hosting account and set as destination the php script called email_to_php.php in this rep.
The path for the php script should follow this structure: /home/accountname/public_html/pathtophpscript  

5) On your server, same directory where the php script is located, create a new directory called "cc" and upload the zip files: "correo.zip" and "api.zip". Unzip and let their names be the same and inside the contents (not the name repeated).  


# Usage  

Customize the following php files to fit your needs:  

1) File parsing the email coming from the server: email_to_php.php  

2) File that speaks to constant contact service: linktolist-act.php  

3) File that message the company/website owner: sendmail-to-recep.php  



# Requirements / Pre-Requisites


1) You will need to create a API key and Access Token for your client at: https://constantcontact.mashery.com  

2) You need to check that Curl extension for PHP is activated on your webserver  

3) This solutions applies only to Ninja Contact Forms according to the fields definition used above  

4) Ensure the body of the message when configuring the contact form appears as follows:  


beginMe
{field:all_fields}
endMe


