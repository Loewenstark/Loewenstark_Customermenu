# Remove links from customer menu via layout.xml

Description
-------------
With this module you can remove links from the menu that logged in customers see via layout XML (files).

Features
-------------
* Output is logged to customermenu.log

Usage example
-------------

Remove newsletter link from customer menu

```
<layout>
    <customer_account>
        <reference name="customer_account_navigation">
            <action method="removeLinkByName"><name>newsletter</name></action>
        </reference>
    </customer_account>
</layout>
```
