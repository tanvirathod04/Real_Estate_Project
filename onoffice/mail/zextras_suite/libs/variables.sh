#!/bin/bash
#
# ***** BEGIN LICENSE BLOCK *****
# Copyright (C) 2014 Zextras
#
# The contents of this file are subject to the Zextras License;
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
# https://www.zextras.com/eula/
#
# Software distributed under the License is distributed on an "AS IS"
# basis, WITHOUT WARRANTY OF ANY KIND, either express or implied.
# ***** END LICENSE BLOCK *****
#


PACKAGE_DIR="`dirname $0`/packages"

ZM_MIN_MAJOR=6
ZM_MIN_MINOR=0
ZM_MIN_MICRO=7


ZAL_JAR="zal.jar"

CORE_INSTALL_DIR="/opt/zimbra/lib/ext/zextras"

CORE_PACKAGE="packages/zextras.jar"
ZIMLET_PACKAGE="packages/com_zextras_zextras.zip"
ZAL_PACKAGE="packages/zal.jar"

TOOL="packages/zxsuite"
NAILGUN="packages/ng"

ZEXTRAS_ZIMLET_NAME="com_zextras_zextras"
ZXMIG_ZIMLET_NAME="com_zextras_zxmig"
ZXCLIENT_ZIMLET_NAME="com_zextras_client"
ZXCHAT_ZIMLET_NAME="com_zextras_chat"
OPEN_CHAT_ZIMLET_NAME="com_zextras_chat_open"

PRODUCT="Zextras Suite"

INSTALL_LOG="/opt/zimbra/.zextras_install_history"

ZIMBRA_SUPPORTED_VERSIONS_FILE="packages/supported_zimbra_versions"

VERSIONS_MAP="packages/versions_map"

# vim:ts=2:sw=2:cindent:et
