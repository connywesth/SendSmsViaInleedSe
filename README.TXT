# _Projects: SendSmsViaInleedSe_

_Description: To send free of charge Sms Text Message to Swedish cellular phones (all operators)_

## Project Setup

_To start using this PHP classes_ 

1. _This requires PHP 5.5.0 or later_
2. _CURL has to be activated in PHP.INI_
3. _Install project files SmsUtility.php, SmsForm.php and the file autoload.php in a subfolder 'lib'_
4. _register at sms.inleed.se to get a sms-key (about 50 characters long)_
5. _Test the sms-key at this link: http://test.verimentor.se/inleed/sms before you continue_
6. _Edit smsKey in line 26 of SmsUtilityTest.php_
7. _Edit phone number to recipient1 in line 27 of SmsUtilityTest.php_
8. _Edit phone number to recipient2 in line 28 of SmsUtilityTest.php_
9. _Edit message text message1 in line 29 of SmsUtilityTest.php_
10. _Edit message text message2 in line 30 of SmsUtilityTest.php_
11. _To run the Console application just type: php SmsUtilityTest.php in the command line_
12. _The message should arrive at the cellular phone after a while, but be patient_ 


## Testing

_How do I run the project's automated tests?_

### Unit Tests

1. `rake spec`

### Integration Tests

1. _Run other local services / provide credentials for external services._
2. `rake spec:integration`

## Deploying

### _How to setup the deployment environment_

- _Required heroku addons, packages, or chef recipes._
- _Required environment variables or credentials not included in git._
- _Monitoring services and logging._

### _How to deploy_

## Troubleshooting & Useful Tools

_Examples of common tasks_

> e.g.
> 
> - How to make curl requests while authenticated via oauth.
> - How to monitor background jobs.
> - How to run the app through a proxy.

## Contributing changes

- _Internal git workflow_
- _Pull request guidelines_
- _Tracker project_
- _Google group_
- _irc channel_
- _"Please open github issues"_

## License

