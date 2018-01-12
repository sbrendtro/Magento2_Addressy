# **From your Magento 2 Store**

Magento 2 offers you an easier way to install extensions and updates by synchronizing your purchases from the marketplace to your store. If you have this setup, you can simply purchase our extension for free and then use the updater to install it into your Magento 2 site.
When the app is installed you can continue to the Magento Settings section to setup your field mappings.

# **Manual Install**

### From ZIP File
- Locate the **/app/code** directory which should be under the magento root installation.
- If the **code** folder is not there, create it.
- Create the folder structure **PCAPredict/Addressy/** inside the **code** folder. 
- Download the zip file from the [Magento 2 Store](https://marketplace.magento.com/pcapredict-addressy.html "Addressy Magento 2 Store") and extract the contents to the **Addressy** folder you just created.

### Magento Setup
- Make sure you have the correct file and folder permissions set on your magento installation so that the magnento store can install the app.
- Refer to the Magento 2 documentation for full instructions on how to install an app, the commands should be similar to the following:
```php bin/magento setup:upgrade - This tells magento to install the app.```
```php bin/magento cache:flush - This flushes the cache so the app appears in the admin area correctly.```

# **App Configuration Options**

The configuration for the extension is located under *Stores* > *Other Settings* > **Addressy Settings**.

### Main screen
- Email Address - Enter your email address you used to sign up to Addressy here.
- Password - The password you used when you setup the account.

### Logged in screen
- Back-end custom javascript - This is for any custom javascript to be injected into the back-end of the website when the app loads.
- Front-end custom javascript - This is for any custom javascript to be injected into the front-end of the website when the app loads.