# Löschen von Elementen im Kundenkonto

per Layout XML

Beispiel zum löschen vom Newsletter Eintrag im Menü

LogFile-Ausgabe customermenu.log

```
<layout>
    <customer_account>
        <reference name="customer_account_navigation">
            <action method="removeLinkByName"><name>newsletter</name></action>
        </reference>
    </customer_account>
</layout>
```