# HeaderHierarchyCorrector
Header Hierarchy Corrector is a joomla frontend plugin that checks hierarchy of heading tags and corrects it via javascript.

## PREREQUISITES 
 * Joomla version 4.x.

## DOWNLOADING THE JOOMLA PLUGIN

* Download this plugin from [HeaderHierarchyCorrector.zip](https://github.com/vorayash/HeaderHierarchyCorrector/archive/refs/heads/main.zip) and install it through Joomla Extension manager.

* Select **"Manage"** under **"Extensions">"Manage"** in the top menu. Search for "Header", select HeaderHierarchyCorrector and click on **"Enable"**.

## PLUGIN SPECIFICATIONS:
- Type: <b> System </b> <br/>
- Events Used: <b> onBeforeRender </b>
- Follows Joomla Coding Standards and Naming Conventions: <b> Yes </b> <br/>
- phpcs sniffer verified: <b> Yes </b> <br/>

## PLUGIN FOLDER STRUCTURE
```
language
   |-- en-GB
   |   |-- en-GB.plg_system_headerhierarchycorrector.ini
   |   |-- en-GB.plg_system_headerhierarchycorrector.sys.ini
   |   |-- index.html
   |-- index.html
media
   |-- index.html
   |-- js
   |   |-- config-header-corrector.es6.js
   |   |-- index.html
```
## PLUGIN FOLLOWS STANDARDS FROM BELOW MENTIONED SOURCES
*https://www.w3.org/WAI/tutorials/page-structure/headings/

## WORKING OF PLUGIN:

Note: Page is being reloaded in the gif

![Entering Text](https://github.com/vorayash/Temp-Gif/blob/main/c9F7T7Kxwb.gif)

## UNINSTALLING THE MODULE IN JOOMLA
Go to **"Extensions Manager"**, inside **"Extensions"**. Press **"Manage"** on the left side menu. Between installed modules, search for **"Header Hierarchy Corrector"**. Click on the checkbox and press **"Uninstall"** on the upper side. A confirmation message will appear.

