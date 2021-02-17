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


logInst () {

  if [[ -d `dirname "$INSTALL_LOG"` ]]; then
    echo `date +%s` "$*" >> "$INSTALL_LOG" 2>/dev/null
  fi

}


logInfo () {

  logInst "INFO $*"

}


logErr () {

  logInst "ERROR $*"

}


acceptLicense() {

  echo ""
  cat <<EOF
----------------------------------------------------------------------
PLEASE READ THIS AGREEMENT CAREFULLY BEFORE USING THE SOFTWARE.
Zextras WILL ONLY LICENSE THIS SOFTWARE TO YOU IF YOU FIRST
ACCEPT THE TERMS OF THIS AGREEMENT. BY DOWNLOADING OR INSTALLING
THE SOFTWARE, OR USING THE PRODUCT, YOU ARE CONSENTING TO BE BOUND BY
THIS AGREEMENT. IF YOU DO NOT AGREE TO ALL OF THE TERMS OF THIS
AGREEMENT, THEN DO NOT DOWNLOAD, INSTALL OR USE THE PRODUCT.

License Terms for this Zextras Suite Software:
https://www.zextras.com/eula/
----------------------------------------------------------------------
EOF
  echo ""
  inquire "Do you agree with the terms of the software license agreement?" "N"
  if [[ $answer != yes ]]; then
    echo "Aborted by user choice."
    logErr "Zextras EULA rejected"
    exit
  fi
  echo ""

  unset answer

}


inquire() {

  local PROMPT
  PROMPT="$1"
  local DEFAULT
  DEFAULT="$2"

  shopt -s nocasematch

  if [[ -n $DEFAULT ]]; then
    if [[ $DEFAULT == @(yes|y) ]]; then
      DEFAULT="Y"
    else
      DEFAULT="N"
    fi
  fi


  while :
  do

    while read -r -t 0; do read -r; done

    echo ""
    echo -n "$PROMPT [$DEFAULT] "
    read answer

    if [[ -z $answer && -n $DEFAULT ]]; then
      answer=$DEFAULT
    fi

    if [[ $answer == @(yes|y) ]]; then
      answer="yes"
      break
    else
      if [[ $answer == @(no|n) ]]; then
        answer="no"
        break
      fi
    fi
    echo "Only a Yes/No answer can be given"
  done

  shopt -u nocasematch

}


checkMinimumZimbraVersion() {

  local CMP
  CMP=`echo ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} ${ZM_MIN_MAJOR}.${ZM_MIN_MINOR}.${ZM_MIN_MICRO}|bin/check_version.pl`

  if [[ $CMP -ge 0 ]] ; then
    return 0
  else
    cat <<EOF

* You are running Zimbra 6.0.6 or older
    $PRODUCT can only be installed on Zimbra 6.0.7 or higher:
      please update to a compatible version in order to be able to install $PRODUCT

EOF
    logErr "Zimbra version ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} < minimum supported version ${ZM_MIN_MAJOR}.${ZM_MIN_MINOR}.${ZM_MIN_MICRO}"
    exit 1
  fi

}

downloadIfRequired() {
  url=$1
  outFile=$2
  if [[ ! -e "$outFile" ]]; then
    bin/wget.pl $url $outFile > /dev/null 2>&1
    exitCode=$?
    if [[ ! $exitCode -eq 0 ]]; then
      echo "Unable to download $(basename $outFile) from $url, download it manually and put it into $(dirname $outFile)/ directory to continue."
      exit $exitCode
    fi
  fi
}

getSupportedVersion() {
  if [[ ! -e ${VERSIONS_MAP} ]]; then
    downloadIfRequired https://download.zextras.com/installer/zextras_suite/versions_map ${VERSIONS_MAP}
  fi
  version=$(grep -e "^${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} " ${VERSIONS_MAP} | awk '{print $2}')
  if [[ -z $version ]]; then
    echo "Unsupported Zimbra version ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO}"
    exit 1
  fi
  export SUPPORTED_VERSION="${version}"
}

checkSupportedZimbraVersions() {

  if [[ ! -r $VERSIONS_MAP ]] ; then
    cat <<EOF


Unable to check for supported versions of Zimbra.
File $VERSIONS_MAP missing.

Exiting ...
EOF
    logErr "File $VERSIONS_MAP missing. Unable to verify supported Zimbra versions."
    exit 1
  fi

  if [[ -z "${SUPPORTED_VERSION}" ]]; then
      cat <<EOF


The Zextras Installer is not compatible with the Zimbra version you are running.

It's likely that:

* You are running a Zimbra version that is not YET supported by $PRODUCT
    After a new Zimbra version is released, a new $PRODUCT version is released
    as well to ensure compatibility:
      please check the "News and Announcements" section of the Zextras Forums
      (http://forums.zextras.com) for new release information.

A complete list of Zimbra versions compatible with $PRODUCT can be found at
  http://wiki.zextras.com/wiki/Compatibility_List

Exiting ...

EOF
    exit 1
  fi
  if [[ ${ZM_CUR_EDITION} == *"NETWORK"* ]]; then
    if [[ ${ZM_CUR_MAJOR} -ge 8 && ${ZM_CUR_MINOR} -ge 8 ]]; then
    cat <<EOF


Zimbra ${ZM_CUR_EDITION} edition is not supported by $PRODUCT

A complete list of Zimbra versions compatible with $PRODUCT can be found at
  http://wiki.zextras.com/wiki/Compatibility_List


Exiting ...

EOF
exit 1
    fi
    export SUPPORTED_VERSION="2.4"
  fi
}

checkExistingZimbraInstall() {

  echo ""
  echo "-------------------------"
  echo ""
  echo "Checking for existing installations ..."
  isZimbraInstalled
  if [[ -n $ZCSINSTALLED ]]; then
    cat <<EOF

FOUND Zimbra ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO}${ZM_CUR_CUST} ${ZM_CUR_EDITION}

EOF
    logInfo "Detected Zimbra version ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO}${ZM_CUR_CUST}"
  else
    cat <<EOF

No Zimbra instance found on this system.
Exiting ...
EOF
    logErr "No Zimbra instance detected."
    exit 1
  fi

  if [[ $ZM_CUR_MAJOR -eq 8 && $ZM_CUR_MINOR -eq 5 ]]; then
    if [[ $ZM_CUR_CUST == BETA* ]]; then
      cat <<EOF

WARNING!
Zimbra 8.5.0 BETA has been detected - this Zimbra version is not meant for Production use.
Aborting installation!

EOF
      logErr "BETA Version of Zimbra 8.5.x detected ... exiting"
      exit 1
    fi
  fi

}


checkZcsVersion() {

  su - zimbra -c "zmcontrol -v" |grep -q -i -- 'ZCA Release 7' && echo "Only ZCA 8+ is supported ... Exiting." && exit 1
  if [[ -n $ZCSINSTALLED ]]; then
    local VRS_ARR
    VRS_ARR=(`su - zimbra -c "zmcontrol -v" | perl -wne 'print join " ", /(\d+)\.(\d+)\.(\d+).([[:alnum:]]+)?.*(FOSS|NETWORK)/ if /edition/'`)
    ZM_CUR_MAJOR=${VRS_ARR[0]}
    ZM_CUR_MINOR=${VRS_ARR[1]}
    ZM_CUR_MICRO=${VRS_ARR[2]}
    [[ $ZM_CUR_MAJOR -eq 8 && $ZM_CUR_MINOR -eq 5 && $ZM_CUR_MICRO -eq 0 && ${VRS_ARR[3]} == BETA* ]] && ZM_CUR_CUST=${VRS_ARR[3]}
    ZM_CUR_EDITION=${VRS_ARR[4]}
  fi

  if [[ ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} != +([0-9]).+([0-9]).+([0-9]) ]]; then
    cat <<EOF

Unable to determine the current Zimbra version.

Exiting ...

EOF
    logErr "Unable to determine the current Zimbra version"
    exit 1
  fi

}


stopZimbra() {

  echo ""
  su - zimbra -c "zmmailboxdctl stop"

}


startZimbra() {

  echo "Starting The Zimbra Web Application (mailboxd) ...."
  echo ""
  su - zimbra -c "zmmailboxdctl start"
  echo ""
  su - zimbra -c "zmmailboxdctl status"
  echo ""

}


verifyExecute() {

  while :; do
    inquire "$1" "$2"

    if [[ $answer == no ]]; then
      inquire "Exit?" "N"
      if [[ $answer == yes ]]; then
        echo "Exiting - Operation aborted by user."
        if [[ -n $ZIMBRA_STATUS && $ZIMBRA_STATUS -eq 0 ]]; then
          cat <<EOF
WARNING: The Zimbra Web Application (mailboxd) is inactive. Restart Manually.
E.g. « su - zimbra -c 'zmmailboxdctl start' »
EOF
        fi
        exit 1
      fi
    else
      break
    fi
  done

  unset answer

}


isMultiServer () {

  local servers
  servers=`/opt/zimbra/bin/zmprov gas -v 2>/dev/null | grep 'zimbraServiceInstalled:.*mailbox' | wc -l`
  if [[ $servers -eq 0 ]]; then
    cat <<EOF

Warning: unable to detect if you are running a Multi-server Zimbra installation.
Please install $PRODUCT on each and every server of your
installation hosting a mailbox (store) instance

EOF
  elif [[ $servers -gt 1 ]]; then
    cat <<EOF

Detected a Zimbra Multi-server installation with several mailbox instances.
Please install $PRODUCT on each and every server of your
installation hosting a mailbox (store) instance

Press ENTER to continue ...
EOF

    logInfo "Zimbra Multi-server installation detected"

    while read -r -t 0; do read -r; done

    read

  fi

}


isZimbraInstalled () {

  if [[ -x /opt/zimbra/bin/zmcontrol ]]; then
    if [[ -x /opt/zimbra/bin/zmmailboxdctl ]]; then
      ZCSINSTALLED=1
      checkZcsVersion
    else
      cat <<EOF

Detected a Zimbra server with no mailbox instance.
$PRODUCT must be installed exclusively on each and
every Zimbra server hosting a mailbox instance (store).

EOF
      logErr "The local Zimbra server hosts no mailbox instance"
      exit 1
    fi
  fi

}


checkZextrasCoreInstall() {

  echo "Checking whether the Core is already installed ..."

  INSTALLED_CORE_VERSION=`bin/zxtool.sh -v 2> /dev/null|sed -n 's/.*[^0-9.]\(\([0-9]\{1,\}\.\)\{1,\}[0-9]\{1,\}\).*/\1/p'`
  if [[ -n $INSTALLED_CORE_VERSION ]] ; then

    CORE_INSTALLED="yes"

    bin/zxtool.sh -v 2>/dev/null|grep -qi 'ZxMig' && INSTALLED_CORE_ZXMIG="yes"

    CMP=`echo $INSTALLED_CORE_VERSION $CORE_VERSION|bin/check_version.pl`


    if [[ -n $INSTALLED_CORE_ZXMIG ]]; then
      logInfo "Zextras Migration Tool core version $INSTALLED_CORE_VERSION present on the server"
    else
      logInfo "Zextras Suite core version $INSTALLED_CORE_VERSION present on the server"
    fi

    if [[ $CMP -gt 0 ]] ; then

      CORE_DOWNGRADE="yes"

    fi

  fi

}


checkZxMigZimletInstall() {

  echo "Checking whether the Zextras Migration Tool Zimlet is already installed ..."

  if [[ -d /opt/zimbra/zimlets-deployed/$ZXMIG_ZIMLET_NAME ]] ; then

    ZXMIG_ZIMLET_INSTALLED="yes"
    INSTALLED_ZXMIG_ZIMLET_VERSION=`sed -n '/version/ s/.*version="\([^"]\{1,\}\)".*/\1/p ' /opt/zimbra/zimlets-deployed/$ZXMIG_ZIMLET_NAME/${ZXMIG_ZIMLET_NAME}.xml`

  else
    ZXMIG_ZIMLET_NEWINSTALL="yes"
  fi

}


checkZextrasZimletInstall() {

  echo "Checking whether the $PRODUCT Zimlet is already installed ..."

  if [[ -d /opt/zimbra/zimlets-deployed/$ZEXTRAS_ZIMLET_NAME ]] ; then

    ZEXTRAS_ZIMLET_INSTALLED="yes"
    INSTALLED_ZEXTRAS_ZIMLET_VERSION=`sed -n '/version/ s/.*version="\([^"]\{1,\}\)".*/\1/p ' /opt/zimbra/zimlets-deployed/$ZEXTRAS_ZIMLET_NAME/${ZEXTRAS_ZIMLET_NAME}.xml`

    CMP=`echo $INSTALLED_ZEXTRAS_ZIMLET_VERSION $ZIMLET_VERSION|bin/check_version.pl`

    if [[ $CMP -le 0 ]] ; then

      logInfo "Detected $PRODUCT Zimlet version $INSTALLED_ZEXTRAS_ZIMLET_VERSION: upgrading"

    else

      ZEXTRAS_ZIMLET_DOWNGRADE="yes"

    fi

  fi

}

checkZextrasClientInstall() {
  if [[ -d /opt/zimbra/zimlets-deployed/$ZXCLIENT_ZIMLET_NAME ]] ; then
    ZXCLIENT_ZIMLET_INSTALLED="yes"
  fi
}

checkZextrasChatInstall() {
  if [[ -d /opt/zimbra/zimlets-deployed/$ZXCHAT_ZIMLET_NAME ]] ; then
    ZXCHAT_ZIMLET_INSTALLED="yes"
  fi
}

checkOpenChatInstall() {
  if [[ -d /opt/zimbra/zimlets-deployed/$OPEN_CHAT_ZIMLET_NAME ]] ; then
    OPEN_CHAT_ZIMLET_INSTALLED="yes"
  fi
}


isZimbraActive() {

  su - zimbra -c "zmmailboxdctl status &> /dev/null" && return 0
  return 1

}

checkOpenChat() {
  if isZimbraChatInstalled; then
    echo "zimbra-chat package detected"
    echo "$PRODUCT Chat is a superset of zimbra-chat with its own database and can't be run together"
    verifyExecute "Uninstall zimbra-chat?" "Y"
    removeZimbraChatPackage
  fi
}

removeZimbraChatPackage() {
  if [ -n "$(command -v yum)" ]; then
    yum -y --disablerepo=* erase -v zimbra-chat >/dev/null 2>&1
  else
    dpkg --purge zimbra-chat >/dev/null 2>&1
  fi
  checkOpenChatInstall
  if [[ $OPEN_CHAT_ZIMLET_INSTALLED == yes ]]; then
    UndeplyOpenChatZimlet
  fi
  echo "done"
}

isZimbraChatInstalled() {
  if [ -n "$(command -v yum)" ]; then
    rpm -q zimbra-chat >/dev/null 2>&1
    if [ $? = 0 ]; then
      return 0
    else
      return 1
    fi
  else
     STATUS=`dpkg -s zimbra-chat 2>/dev/null | egrep '^Status: '`
     if [[ $? = 0 && $STATUS != *"not-installed"* && $STATUS != *"deinstall ok"* ]]; then
       return 0
     else
       return 1
     fi
  fi
}

installZextrasCore() {

  if [[ ! -d $CORE_INSTALL_DIR ]]; then
    mkdir "$CORE_INSTALL_DIR"
    if [[ $? -ne 0 ]]; then
      echo "Destination directory $CORE_INSTALL_DIR cannot be created. Exiting."
      logErr "Destination directory $CORE_INSTALL_DIR could not be created"
      exit 1
    fi
    chown zimbra:zimbra "$CORE_INSTALL_DIR"
  fi

  rm -f "/opt/zimbra/bin/"`basename $NAILGUN`
  rm -f  /opt/zimbra/lib/ext/zextras/extension-path
  rm -f "$CORE_INSTALL_DIR"/zextras.jar &> /dev/null

  if [[ -r $CORE_PACKAGE ]]; then
    if [[ ! -w $CORE_INSTALL_DIR ]]; then
      chown zimbra:zimbra "$CORE_INSTALL_DIR"
      chmod 755 "$CORE_INSTALL_DIR"
    fi

    if [[ -z $ZAL_UPGRADE_UNNEEDED ]]; then
      if [[ -r $ZAL_PACKAGE ]]; then
        cp "$ZAL_PACKAGE" "$CORE_INSTALL_DIR";
        if [[ $? -ne 0 ]]; then
          echo "Destination directory $CORE_INSTALL_DIR cannot be written in. Exiting."
          logErr "Destination directory $CORE_INSTALL_DIR cannot be written in"
          exit 1
        fi
      else
        echo "$ZAL_PACKAGE missing. Installation aborted."
        logErr "$ZAL_PACKAGE missing. Installation aborted."
        exit 1
      fi
    else
      logInfo "Skipping ZAL upgrade since an up-to-date version is already installed"
    fi

    trap "" SIGINT SIGQUIT
    cp "$CORE_PACKAGE" "$CORE_INSTALL_DIR"
    if [[ $? -ne 0 ]]; then
      echo "Destination directory $CORE_INSTALL_DIR cannot be written in. Exiting."
      logErr "Destination directory $CORE_INSTALL_DIR cannot be written in"
      exit 1
    fi
    chown -R zimbra:zimbra "$CORE_INSTALL_DIR"
    cp -a bin/zxtool.sh /tmp
    su zimbra -c "bash /tmp/zxtool.sh -m zextras" 2>/dev/null
    if [[ $? -ne 0 ]]; then
      echo "Failed to set $PRODUCT mode. Installation aborted. " && rm -f "$CORE_INSTALL_DIR"/*.jar
      logErr "Failed to set $PRODUCT mode. Installation aborted"
      exit 1
    fi
    rm -f /tmp/zxtool.sh &> /dev/null
    trap - SIGINT SIGQUIT
  else
    cat <<EOF
Package $CORE_PACKAGE missing.
Most likely either your Zimbra version is not yet supported
or this version of $PRODUCT is not the latest one.
Check http://www.zextras.com for the latest release and
http://wiki.zextras.com/wiki/Compatibility_List for the
Zimbra releases currently supported.
EOF
    echo "Exiting ..."
    logErr "Package $CORE_PACKAGE missing"
    exit 1
  fi

  cp "$TOOL" /opt/zimbra/bin

  echo "Zextras Core installation successfully completed."
  logInfo "Zextras Core installation successfully completed"
  if [[ $PROCESS_MODE != all ]]; then
    cat <<EOF
Please restart the Zimbra Web Application (mailboxd) manually.
E.g. « su - zimbra -c 'zmmailboxdctl start' »
EOF
  fi
  cat <<EOF

* Be warned that $PRODUCT needs for the
* related zimlet to be installed in order to operate.

EOF

}


installZextrasZimlet() {

  if [[ -r $ZIMLET_PACKAGE ]]; then

    checkZimletPackageVersion

    checkZextrasCoreInstall

    local ZIMLET_NAME
    ZIMLET_NAME=`echo $ZIMLET_PACKAGE | sed -n 's@.*/\(com.*\)\.zip@\1@p'`

    if [[ $CORE_INSTALLED == yes ]]; then
      echo ""
      echo "$PRODUCT Core detected."
      echo ""
      if [[ $ZIMLET_PACKAGE_VERSION != $INSTALLED_CORE_VERSION ]]; then
        echo ""
        echo "Your $PRODUCT Core version and the $PRODUCT Zimlet version do not match! Exiting."
        logErr "The $PRODUCT Core version and the $PRODUCT Zimlet version do not match"
        exit 1
      else
        if [[ ${ZM_CUR_MAJOR} -eq 8 ]]; then

          cat <<EOF



****************************  Note  ****************************

WARNING: Zimbra 8.x users might experience slowness and AJAX errors
when accessing the Zimbra Administration Console because of the
Zimbra DOS Filter. In this case, raising the number of Maximum Requests
per Second is suggested (see http://wiki.zextras.com/DosFilter
for further informations)

****************************************************************

Press ENTER to continue ...
EOF

          while read -r -t 0; do read -r; done
          read

        fi

        echo "Deploying zimlet ..."
        echo ""
        local ZIMLET_LOG_FILE
        ZIMLET_LOG_FILE="/tmp/zextras-zimlet-install-log-$$.txt"
        export ZIMLET_LOG_FILE
        (
          chown zimbra:zimbra -R /opt/zimbra/zimlets-deployed/$ZEXTRAS_ZIMLET_NAME &> /dev/null
          umask 0027
          sudo -u zimbra /opt/zimbra/bin/zmzimletctl deploy "${ZIMLET_PACKAGE}" &> $ZIMLET_LOG_FILE
        )

        local exit
        exit=$?
        grep INFO "$ZIMLET_LOG_FILE" 2> /dev/null

        if [[ $exit -ne 0 ]]; then
          cat <<EOF

The zimlet installation might have failed, please check whether
the Zextras Administration Zimlet is properly displayed
upon accessing the Zimbra Administration Console.

Installation failure might be caused by an incomplete startup
of the Zimbra "mailboxd" service or by a server configuration issue.

Please verify that Zimbra is up and running, then retry the deployment
of the zimlet running « ./install.sh zimlet ».

Check
$ZIMLET_LOG_FILE
for further details.

EOF
          logErr "Zimlet installation might have failed"
          exit 1
        else
          sleep 15
          su - zimbra -c "/opt/zimbra/bin/zmzimletctl setPriority com_zextras_zextras 0" > /dev/null
          /opt/zimbra/bin/zmprov flushCache zimlet
          /opt/zimbra/bin/zmprov flushCache zimlet com_zextras_zextras
          su - zimbra -c "zxsuite admin doSetZimletRights" > /dev/null
          /opt/zimbra/bin/zmzimletctl listZimlets|grep -qi $ZIMLET_NAME
          if [[ $? -ne 0 ]]; then
            echo ""
            echo "Zimlet installation failed. Exiting."
            echo "......."
            echo "The Zimlet installation has failed. That might be due to an incomplete startup"
            echo "of the Zimbra webapp. Please verify Zimbra is up and running, then retry"
            echo "the deployment of the zimlet with ./install.sh zimlet  ."
            echo "......."
            logErr "Zimlet installation failed"
            exit 1
          else
            echo ""
            echo "The $PRODUCT Zimlet has been successfully installed."
            logInfo "$PRODUCT Zimlet installation completed"
          fi
        fi
      fi
    else
      echo ""
      echo "No Core installation found. Exiting."
      logErr "No Core installation found. Exiting."
      exit 1
    fi
  fi

}


checkZimletPackageVersion() {

  ZIMLET_PACKAGE_VERSION=$CORE_VERSION

}


checkZextrasCoreVersion() {

  CORE_VERSION=`bin/zxtool.sh -p $CORE_PACKAGE -v 2>/dev/null|sed -n 's/.*[^0-9.]\(\([0-9]\{1,\}\.\)\{1,\}[0-9]\{1,\}\).*/\1/p'`

}


removeZextrasCore() {

  rm -rf "$CORE_INSTALL_DIR"
  if [[ $? -ne 0 ]]; then
    cat <<EOF

JAR files in $CORE_INSTALL_DIR cannot be removed.
Zextras Core removal failed.
EOF
    logErr "JAR files in $CORE_INSTALL_DIR cannot be removed. Removal failed"
    echo "Zextras Core removal failed."
    exit 1
  else
    cat <<EOF

Zextras Core successfully removed.
EOF
    logInfo "Zextras Core successfully removed."
    if [[ $PROCESS_MODE != all ]]; then
      cat <<EOF
Please restart the Zimbra Web Application (mailboxd) manually.
E.g. « su - zimbra -c 'zmmailboxdctl start' »
EOF
    fi
  fi

  if [[ -e /opt/zimbra/bin/`basename $TOOL` ]]; then
    rm -f "/opt/zimbra/bin/"`basename $TOOL`
  fi

  if [[ -e /opt/zimbra/bin/`basename $NAILGUN` ]]; then
    rm -f "/opt/zimbra/bin/"`basename $NAILGUN`
  fi

  rm -f  /opt/zimbra/lib/ext/zextras/extension-path
  rm -rf /opt/zimbra/conf/zextras/jars
  rm -rf /opt/zimbra/redolog/*zetmp

}


removeZextrasZimlet() {

  local ZIMLET_NAME
  ZIMLET_NAME=`echo $ZIMLET_PACKAGE | sed -n 's@.*/\(com.*\)\.zip@\1@p'`
  /opt/zimbra/bin/zmzimletctl undeploy $ZIMLET_NAME
  if [[ $? -ne 0 ]]; then
    echo ""
    echo "$PRODUCT Zimlet removal failed. Exiting."
    logErr "$PRODUCT Zimlet removal failed. Exiting."
    exit 1
  else
    sleep 15
    /opt/zimbra/bin/zmzimletctl listZimlets|grep -qi $ZIMLET_NAME
    if [[ $? -ne 0 ]]; then
      echo ""
      echo "$PRODUCT Zimlet removal successful."
      logInfo "$PRODUCT Zimlet removal successful."
    else
      echo ""
      echo "$PRODUCT Zimlet removal failed. Exiting."
      logErr "$PRODUCT Zimlet removal failed. Exiting."
      exit 1
    fi
  fi

}

removeZextrasClient() {

  /opt/zimbra/bin/zmzimletctl undeploy $ZXCLIENT_ZIMLET_NAME
  if [[ $? -ne 0 ]]; then
    echo ""
    echo "$PRODUCT Client Zimlet removal failed. Exiting."
    logErr "$PRODUCT Client Zimlet removal failed. Exiting."
    exit 1
  else
    sleep 5
    /opt/zimbra/bin/zmzimletctl listZimlets|grep -qi $ZXCLIENT_ZIMLET_NAME
    if [[ $? -ne 0 ]]; then
      echo "$PRODUCT Client Zimlet removal successful."
      logInfo "$PRODUCT Client Zimlet removal successful."
      echo ""
    else
      echo ""
      echo "$PRODUCT Client Zimlet removal failed. Exiting."
      logErr "$PRODUCT Client Zimlet removal failed. Exiting."
      exit 1
    fi
  fi

}

removeZextrasChat() {

  local ZIMLET_NAME
  ZIMLET_NAME=`echo $ZIMLET_PACKAGE | sed -n 's@.*/\(com.*\)\.zip@\1@p'`
  /opt/zimbra/bin/zmzimletctl undeploy $ZXCHAT_ZIMLET_NAME
  if [[ $? -ne 0 ]]; then
    echo ""
    echo "$PRODUCT Chat removal failed. Exiting."
    logErr "$PRODUCT Chat removal failed. Exiting."
    exit 1
  else
    sleep 5
    /opt/zimbra/bin/zmzimletctl listZimlets|grep -qi $ZXCHAT_ZIMLET_NAME
    if [[ $? -ne 0 ]]; then
      echo "$PRODUCT Chat removal successful."
      logInfo "$PRODUCT Chat removal successful."
      echo ""
    else
      echo ""
      echo "$PRODUCT Chat removal failed. Exiting."
      logErr "$PRODUCT Chat removal failed. Exiting."
      exit 1
    fi
  fi

}

UndeplyOpenChatZimlet() {

  /opt/zimbra/bin/zmzimletctl undeploy $OPEN_CHAT_ZIMLET_NAME
  if [[ $? -ne 0 ]]; then
    echo ""
    echo "$OPEN_CHAT_ZIMLET_NAME removal failed. Exiting."
    exit 1
  else
    sleep 5
    /opt/zimbra/bin/zmzimletctl listZimlets|grep -qi $OPEN_CHAT_ZIMLET_NAME
    if [[ $? -ne 0 ]]; then
      echo "$OPEN_CHAT_ZIMLET_NAME removal successful."
      echo ""
    else
      echo ""
      echo "$OPEN_CHAT_ZIMLET_NAME removal failed. Exiting."
      exit 1
    fi
  fi

}

installCredits() {

  sed -i 's#^\(^\([[:blank:]]*[[:alpha:]]\{1,\}lientLoginNotice.*\)\?[[:blank:]]\{1,\}<a target="_new" href="https\?://www.zimbra.com/forums">[^[:blank:]]\{1,\}</a>[[:blank:]]*\)$#\1 | Powered by <a target="_new" href="http://www.zextras.com">Zextras</a> |#' /opt/zimbra/mailboxd/webapps/zimbra/WEB-INF/classes/messages/* &>/dev/null

}


uninstallCredits() {

  if [[ ${ZM_CUR_MAJOR} -lt 8 ]]; then
    if [[ -e /opt/zimbra/mailboxd/webapps/zimbra/public/login.jsp ]]; then
      sed -i 's@^<em.*</em>\(</body>\)$@\1@' /opt/zimbra/mailboxd/webapps/zimbra/public/login.jsp &>/dev/null
    fi
  fi
  sed -i 's# :: <a target="_new" href="http://www.zextras.com">Zextras</a>##' /opt/zimbra/mailboxd/webapps/zimbra/WEB-INF/classes/messages/* &>/dev/null
  sed -i 's# | Enhanced by <a target="_new" href="http://www.zextras.com">Zextras</a> |##' /opt/zimbra/mailboxd/webapps/zimbra/WEB-INF/classes/messages/* &>/dev/null
  sed -i 's# | Powered by <a target="_new" href="http://www.zextras.com">Zextras</a> |##' /opt/zimbra/mailboxd/webapps/zimbra/WEB-INF/classes/messages/* &>/dev/null

}



validateZalPackage() {

  local PACKAGE
  PACKAGE="$1"

  if [[ `bin/zaltool.sh ${PACKAGE:+ -p "$PACKAGE"} -c 2> /dev/null` == OK ]]; then
    return 0
  else
    return 1
  fi

}


checkZalInstall() {

  echo "Checking whether the ZAL is already installed ..."

  if [[ -e ${CORE_INSTALL_DIR}/$ZAL_JAR ]]; then

    INSTALLED_ZAL_VALID="yes"
    INSTALLED_ZAL_VERSION=`bin/zaltool.sh -v`
    INSTALLED_ZAL_VARIANT=`bin/zaltool.sh -V`

    if [[ -n $INSTALLED_ZAL_VALID && $INSTALLED_ZAL_VERSION == +([0-9]).+([0-9]).+([0-9]) && $INSTALLED_ZAL_VARIANT == +([0-9]).+([0-9]).+([0-9]) ]]; then

      ZAL_INSTALLED="yes"

      local CMP
      CMP=`echo $INSTALLED_ZAL_VERSION $ZAL_MIN_VERSION|bin/check_version.pl`

      logInfo "ZAL version $INSTALLED_ZAL_VERSION for Zimbra $INSTALLED_ZAL_VARIANT present on the server"

      if [[ $CMP -lt 0 || $INSTALLED_ZAL_VARIANT != ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} ]]; then

        ZAL_UPGRADE_NEEDED="yes"

      fi

    fi

  fi

}


acceptZalLicense() {

  cat <<EOF

----------------------------------------------------------------------
In order to be operational, Zextras Suite requires the "ZAL" library
to be installed.
ZAL is released under the GNU General Public License version 2.

Due to license restraints, the ZAL library can't be distributed with
$PRODUCT , and therefore must be downloaded from the ZAL website.
----------------------------------------------------------------------

EOF

  inquire "Do you wish for $PRODUCT to automatically download, install and upgrade the ZAL Library? [Y/N]" ""
  if [[ $answer != yes ]]; then
    echo "Aborted by user choice."
    logErr "ZAL EULA rejected"
    exit
  fi
  echo ""

  unset answer

}


getMinimumSupportedZalVersion() {

  ZAL_MIN_VERSION=`bin/zxtool.sh -p "$CORE_PACKAGE" -a`
  local VRS_ARR
  VRS_ARR=(${ZAL_MIN_VERSION//./ })
  ZAL_MIN_MAJOR=${VRS_ARR[0]}
  ZAL_MIN_MINOR=${VRS_ARR[1]}
  ZAL_MIN_MICRO=${VRS_ARR[2]}


  if [[ ${ZAL_MIN_MAJOR}.${ZAL_MIN_MINOR}.${ZAL_MIN_MICRO} != +([0-9]).+([0-9]).+([0-9]) ]]; then
    cat <<EOF

Unable to determine the minimum required ZAL version

Exiting ...

EOF
    logErr "Unable to determine the minimum ZAL version"
    exit 1
  fi

}


getZal() {


  echo "Downloading the ZAL library. It might take a few minutes ..."
  logInfo "ZAL Download"

  bin/get_zal.pl ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} ${ZAL_MIN_MAJOR}.${ZAL_MIN_MINOR} "${ZAL_PACKAGE}.temp"

  if [[ $? -eq 0 ]]; then

    logInfo "Download succeeded for ZAL branch ${ZAL_MIN_MAJOR}.${ZAL_MIN_MINOR} variant ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO}"

    ZAL_DOWNLOAD_VERSION=`bin/zaltool.sh -p "${ZAL_PACKAGE}".temp -v`
    ZAL_DOWNLOAD_VARIANT=`bin/zaltool.sh -p "${ZAL_PACKAGE}".temp -V`

    if [[ $ZAL_DOWNLOAD_VERSION == +([0-9]).+([0-9]).+([0-9]) && $ZAL_DOWNLOAD_VARIANT == +([0-9]).+([0-9]).+([0-9]) ]]; then

      logInfo "Downloaded ZAL version $ZAL_DOWNLOAD_VERSION variant $ZAL_DOWNLOAD_VARIANT"

      ZAL_DOWNLOAD_OK="yes"

      local CMP
      CMP=`echo $ZAL_DOWNLOAD_VERSION $ZAL_MIN_VERSION|bin/check_version.pl`

      if [[ $CMP -ge 0 && $ZAL_DOWNLOAD_VARIANT == ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} ]]; then

        logInfo "Downloaded ZAL package viable"

        mv -f "${ZAL_PACKAGE}.temp" "${ZAL_PACKAGE}" && \
        {
          ZAL_DOWNLOAD_VIABLE="yes"
          echo "Download succeeded and validated for ZAL branch ${ZAL_MIN_MAJOR}.${ZAL_MIN_MINOR} variant ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO}"
        }

      else

        logErr "ZAL version upstream too old"

      fi

    fi

  else

    logErr "Download failed for ZAL"

  fi

  rm -f "${ZAL_PACKAGE}.temp" 2> /dev/null

}



# vim:ts=2:sw=2:cindent:et
