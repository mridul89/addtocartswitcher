Add To Cart Switcher
====================
A Magento Extension that adds the ability of configuring where to redirect users after they choose to add a particular product
The options include-
* Checkout Page
* My Cart Page (default)
* The Previously Viewed Page

The location can be configured on a per-category basis

Installation Instructions
-------------------------
Just copy & paste the app folder into your magento installation directory, clear the cache & enjoy the features :-)
You only need to clear the first cache from System > Cache Mangement. The one where Cache Type is "Configuration". The module itself will take care of others.

Note that there is already an app folder in your magento install. You should merge the 2 folders. Don't worry as this extension doesn't over-write any other files.

Who can use this
----------------
This extension can help improve the user experience on your magento store by automatically sending the users to the next page they want to view without them clicking various links again & again.

Typically, you would send to checkout page either in stores which sell only one product or for products where user is not likely to purchase any more products for eg. downloadable products
You should send to My Cart Page in stores who want the user to estimate shipping costs or review their purchase
You should send to the previously viewed page in case you want the users to buy more than one product

Installation using modman
-------------------------
You only need the last step if you are already using modman for some other extension
* Get `modman` from its repo `git clone https://github.com/colinmollenhour/modman.git`
* Copy modman to magento root `cp modman/modman /path/to/magento/root/modman`
* Change to magento root directory & run `modman init`
* In magento admin panel, go to System > Configuration > Advanced > Developer > Template Settings. Change `Allow Symlinks` to `Yes`.
* Clone this repository inside modman `modman clone https://github.com/mridul89/addtocartswitcher.git`


In case you have any suggestions or feature requests or just want to talk about this extension, please get in touch.
