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

DEFAULT_JAR="/opt/zimbra/lib/ext/zextras/zal.jar"

methodCall() {
  exec /opt/zimbra/bin/zmjava -cp "${PACKAGE:=$DEFAULT_JAR}" "$@"
}

getChecksum() {
  methodCall "org.openzal.zal.tools.ChecksumChecker" "${PACKAGE:=$DEFAULT_JAR}"
  exit $?
}

getVersion() {
  methodCall "org.openzal.zal.ZalVersion" | perl -0077 -pe 's/.*zal_version: (\S+).*/\1/s'
}

getVariant() {
  methodCall "org.openzal.zal.ZalVersion" | perl -0077 -pe 's/.*target_zimbra_version: (\S+).*/\1/s'
}

while getopts "vVcp:" Option
do
  case $Option in
    c)
      METHOD="getChecksum"
      break
      ;;
    v)
      METHOD="getVersion"
      break
      ;;
    V)
      METHOD="getVariant"
      break
      ;;
    p)
      PACKAGE="$OPTARG"
      ;;
  esac
done
shift $(($OPTIND - 1))


if [[ ( ! -e $DEFAULT_JAR ) && -z $PACKAGE ]]; then
  echo "No installation found. In this case an alternative package location must be specified" 1>&2
  exit 1
fi

eval $METHOD


# vim:ts=2:sw=2:cindent:et
