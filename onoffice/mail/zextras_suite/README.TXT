# Copyright (C) 2014 ZeXtras®

ZeXtras® Suite - Modular Addon for Zimbra Open Source Edition

=== INFO ===
ZeXtras® Suite is made to expand the capabilities of your Zimbra Open Source Edition.
ZeXtras® is packaged as a modular solution allowing you to pay only what you actually need.
Each module adds a new feature, giving you the power to do things you thought impossible with Zimbra Open Source Edition. 

=== COMPATIBILITY ===
ZeXtras® Suite must be installed on a Zimbra Server version 6.0.7+
For more information about supported Operating Systems, please check http://wiki.zextras.com/wiki/Compatibility_List

ZeXtras® Suite is NOT an add-on for Zimbra Desktop or Zimbra Email Appliance.

=== EXTERNAL LIBRARIES ===
In order to be operational, ZeXtras® Suite requires the "ZAL" library to be installed.
ZAL is released under the GNU General Public License version 2.

Due to license restraint, the ZAL library can't be distributed with ZeXtras® Suite , and therefore must be downloaded from the ZAL website.
The ZeXtras® Installer will prompt the user to automatically download the "ZAL" library if needed.

Additional OSS libraries are distributed together with this software. See docs/open_source_licenses.txt for more info.

=== INSTALL GUIDE ===
The complete ZeXtras® Suite Install Guide can be found at http://wiki.zextras.com/wiki/ZeXtras_Suite_Installation_Guide

=== ZIMLET CACHE ===
After either installing or uninstalling ZeXtras® Suite, it's highly suggested to clear both your browser's and server's cache.
In order to clear your server's Zimlet cache, simply run
«zmprov fc -a zimlet»
as the 'zimbra' user.

=== ONLINE RESOURCES ===
Website: http://www.zextras.com
Technical Documentation: http://wiki.zextras.com/
Forums and Community: http://forums.zextras.com/
Online Store: http://store.zextras.com

End-User License Agreement: https://www.zextras.com/eula/
What is ZeXtras® Suite?: http://www.zextras.com/what-is-zextras.html
FAQ: http://wiki.zextras.com/wiki/Category:FAQ

=== PROGRAM USAGE ===
./install.sh -h | ./install.sh [ -u ] [ -d ] all|zimlet|core 

-h         Help message
-d         Activates debug mode for the install script
-u         Uninstall the target


The targets available for (un)installation are:
core   -- ZeXtras® Suite Core
zimlet -- ZeXtras® Suite Zimlet
all    -- ZeXtras® Core followed by ZeXtras® Suite Zimlet

* In order to use ZeXtras® Suite both core
* and zimlet need to be installed.


