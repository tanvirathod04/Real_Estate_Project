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

while getopts "vlam:p:" Option
do
  case $Option in
    v)
      ARGS="--version"
      break
      ;;
    l)
      ARGS="--get-license-info"
      break
      ;;
    m)
      ARGS="--set-mode $OPTARG"
      if [[ -z $OPTARG ]]; then
        echo "Specify mode to be set" 1>&2
      fi
      break
      ;;
    a)
      ARGS="--zal"
      break
      ;;
#    z)
#      ARGS="--zimlet-version $OPTARG"
#      if [[ -z $OPTARG ]]; then
#        echo "Missing zimlet argument" 1>&2
#      fi
#      break
#      ;;
    p)
      PACKAGE="$OPTARG"
      ;;
  esac
done
shift $(($OPTIND - 1))

DEFAULT_JAR="/opt/zimbra/lib/ext/zextras/zextras.jar"

if [[ ( ! -e $DEFAULT_JAR ) && -z $PACKAGE ]]; then
  echo "No installation found. In this case an alternative package location must be specified" 1>&2
  exit 1
fi

DEFAULT_JAR=$DEFAULT_JAR:/opt/zimbra/lib/ext/zextras/zextras-lib.jar

exec /opt/zimbra/bin/zmjava -cp "${PACKAGE:=$DEFAULT_JAR}" com.zextras.ZxSuite $ARGS


# vim:ts=2:sw=2:cindent:et
