# SiteBootstrap
A pre built set of tools and classes to start any quick website project


There are a few items that will need to be changed to start


1. app -> config -> development.php
		- Need to change `template_data -> url` to the base url
		- Mail settings are also located in there
		- add or change anything else as needed

2. app -> config -> db.php
		- Need to change database connection info

3. public -> css -> font-awesome.min.css 
		- verify the fonts are being pointed to correctly
		- verify fontawesome is a good version, may be newer ones

4. public -> css
		- create compass project in folder names v1
		- or you can change the folder name in the templates

5. public -> js
		- validate that require.js or any other js files are up to date

6. app -> Code
		- needs to be changed to whatever name you want
		- also will need to be changed in composer.json

7. composer.json
		- need to install composer packages
		- verify versioning is correct
		- psr4 loading seems to only work with 'composer dump-autoload -o' command. Something to keep in mind.




