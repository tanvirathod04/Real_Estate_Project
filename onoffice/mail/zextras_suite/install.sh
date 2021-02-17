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


shopt -s extglob


usage() {

  echo "$0 -h | $0 [ -u ] [ -d ] all|zimlet|core "
  echo ""
  echo "-h         This very message"
  echo "-d         Activates debug mode for the install script"
  echo "-u         Uninstall the target"
  echo ""
  echo "The targets available for (un)installation are:"
  echo "core   -- $PRODUCT Core"
  echo "zimlet -- $PRODUCT Zimlet"
  echo "all    -- $PRODUCT Core followed by $PRODUCT Zimlet"
  echo ""
  echo "* In order to use $PRODUCT both"
  echo "* core and zimlet need to be installed."
  echo ""
  exit

}


stopServices() {

  isZimbraActive
  if [[ $? -ne 1 ]]; then
    echo ""
    echo "The Zimbra Web Application must be restarted "
    echo "in order to perform the installation."
    inquire "Do you wish to stop the Zimbra Web Application (mailboxd)?" "Y"
    if [[ $answer == no ]]; then
      echo "Aborting by user choice."
      exit 1
    else
      stopZimbra
      logInfo "Stopping mailboxd"
    fi
    isZimbraActive
    if [[ $? -ne 1 ]]; then
      echo "Zimbra hasn't shutdown properly. Exiting now."
      logErr "Mailboxd failed to stop"
      exit 1
    fi
    ZIMBRA_STATUS=0
    ZIMBRA_ACTIVE="yes"
  fi

  unset answer

}


startServices() {

  isZimbraActive
  if [[ $? -ne 0 ]]; then
    echo ""
    echo "The Zimbra Web Application (mailboxd) must be active in order to proceed."
    inquire "Do you wish to start the Zimbra Web Application (mailboxd)?" "Y"
    if [[ $answer == no ]]; then
      echo "Aborting by user choice."
      exit 1
    else
      startZimbra
      echo "Waiting 60s for Zimbra to initialize ..."
      logInfo "Starting mailboxd"
      sleep 60
    fi
    isZimbraActive
    if [[ $? -ne 0 ]]; then
      echo "Zimbra hasn't started properly. Exiting now."
      logErr "Mailboxd failed to start"
      exit 1
    fi
    ZIMBRA_STATUS=1
  fi

  unset answer

}


coreProcess() {

  echo ""
  echo "==========================="

  if [[ `whoami` != root ]]; then
    echo "You must be running this script as the root user"
    logErr "Running the script as a non-root user"
    exit 1
  fi

  if [[ $UNINSTALL == yes ]]; then
    if [[ $CORE_INSTALLED == yes && $INSTALLED_CORE_ZXMIG != yes ]]; then
      echo ""
      if [[ $ZXCLIENT_ZIMLET_INSTALLED == yes ]]; then
        echo "$PRODUCT Client zimlet detected"
        verifyExecute "Continue uninstall procedure removing $PRODUCT Client zimlet?" "N"
        removeZextrasClient
      fi
      if [[ $ZXCLIENT_ZIMLET_INSTALLED == yes ]]; then
        echo "$PRODUCT Chat zimlet detected"
        verifyExecute "Continue uninstall procedure removing $PRODUCT Chat zimlet?" "N"
        removeZextrasChat
      fi
      echo ""
      echo "Beginning Core removal procedure ..."
      logInfo "Beginning Core removal"
      stopServices
      coreRemove
    else
      echo ""
      echo "No $PRODUCT Core installation has been found to remove. Exiting."
      logErr "No $PRODUCT Core installation has been found to remove. Exiting."
      if [[ $PROCESS_MODE != all ]]; then
        exit 1
      fi
    fi
  else
    echo ""
    echo "Beginning Core installation procedure ..."
    logInfo "Beginning Core installation procedure"

    echo ""
    echo ""
    echo ""
    echo "****************************  Note  ****************************"
    echo ""
    echo "In addition to the $PRODUCT Zimlet a command line tool"
    echo "is also available, \"zxsuite\" ."
    echo "Run it as the zimbra user in order to see the available options."
    echo ""
    echo "****************************************************************"
    echo ""
    echo "Press ENTER to continue ..."

    while read -r -t 0; do read -r; done

    read

    echo ""
    echo ""
    echo "************************  WARNING:  ************************"
    echo ""
    echo "$PRODUCT needs to bind on TCP ports 8735 and 8736 in order"
    echo "to operate, for inter-instance communication."
    echo "The Zextras Chat module needs to bind on TCP ports 5222 and/or "
    echo "5223 in order for any XMPP feature to be functional."
    echo "Please verify no other service listens on these ports and that "
    echo "ports 8735 and 8736 are properly filtered from public access "
    echo "by your firewall."
    echo ""
    echo "************************************************************"
    echo ""

    zalDownload
    coreInstall
  fi

  echo ""
  echo "==========================="

}

downloadArtifacts() {
  downloadIfRequired https://download.zextras.com/installer/zextras_suite/${SUPPORTED_VERSION}/zextras.jar packages/zextras.jar
  downloadIfRequired https://download.zextras.com/installer/zextras_suite/${SUPPORTED_VERSION}/zxsuite packages/zxsuite
  chmod 755 packages/zxsuite
  downloadIfRequired https://download.zextras.com/installer/zextras_suite/${SUPPORTED_VERSION}/com_zextras_zextras.zip packages/com_zextras_zextras.zip
  downloadIfRequired https://download.zextras.com/installer/zextras_suite/${SUPPORTED_VERSION}/com_zextras_client.zip packages/com_zextras_client.zip
}

checkPackageEmpty() {
  if [[ -n $(ls -A packages/) ]]; then
    inquire "The 'packages' directory of the installer is not empty, this might be because a previous version was downloaded in the past. Do you wish to download all required files again?" "Y"
    if [[ $answer == "yes" ]]; then
      rm -rf packages/*
    fi
  fi
}


zalDownload() {

  if [[ -n $ZAL_UPGRADE_UNNEEDED ]]; then

    logInfo "Skipping unnecessary ZAL installation"
    return

  elif [[ -n $ZAL_DOWNLOAD_UNNEEDED ]]; then

    logInfo "Skipping unnecessary ZAL download"
    return

  else

    getZal

    if [[ -z $ZAL_DOWNLOAD_VIABLE ]]; then

      if [[ ( -z $ZAL_PACKAGE_VIABLE && -n $ZAL_UPGRADE_NEEDED ) || ( -z $ZAL_INSTALLED && ! -r $ZAL_PACKAGE ) ]]; then

        if [[ -z $ZAL_DOWNLOAD_OK ]]; then

          logErr "Unable to download the necessary ZAL component"
          cat <<EOF

Unable to check for or download the latest version of the ZAL
component.
You need to upgrade the ZAL component manually.
Check the documentation at www.zextras.com on the subject to
locate which version is the correct one for this release of
$PRODUCT and your version of Zimbra.

Once you have downloaded the the appropriate file for your
Zimbra version, rename it as « zal.jar » and place it in
the packages subdirectory, currently located at

`readlink -f packages`

and rerun the installer.

Exiting ...

EOF

          exit 1

        else

          cat <<EOF




The ZAL version downloaded by the Zextras Installer is too old
and it's not compatible with this release of Zextras Suite:
please check the Zextras Forums at http://forums.zextras.com for more info.

EOF
          exit 1

        fi

      fi

    elif [[ -n $ZAL_UPGRADE_DESIRABLE ]]; then

      logInfo "Unable to download an upgrade of the ZAL component. Proceeding ..."

    fi

  fi

}


zimletProcess() {

  echo ""
  echo "==========================="

  if [[ `whoami` != root ]]; then
    echo "You must be running this script as the root user"
    logErr "Running the script as a non-root user"
    if [[ $ZIMBRA_STATUS -eq 0 ]]; then
      echo "WARNING: The Zimbra Web Application (mailboxd) is inactive. Restart Manually."
      echo "E.g. « su - zimbra -c 'zmmailboxdctl start' »"
    fi
    exit 1
  fi

  if [[ $UNINSTALL == yes ]]; then
    if [[ $ZEXTRAS_ZIMLET_INSTALLED == yes ]]; then
      echo ""
      echo "Beginning $PRODUCT Zimlet removal procedure ..."
      startServices
      zimletRemove
    else
      echo ""
      echo "No $PRODUCT Zimlet installation has been found to remove. Exiting."
      logErr "No $PRODUCT Zimlet installation has been found to remove. Exiting."
      if [[ $ZIMBRA_STATUS -eq 0 ]]; then
        echo "WARNING: The Zimbra Web Application (mailboxd) is inactive. Restart Manually."
        echo "E.g. « su - zimbra -c 'zmmailboxdctl start' »"
      fi
      echo ""
      exit 1
    fi
  else
    echo ""
    echo "Beginning $PRODUCT Zimlet installation procedure ..."
    logInfo "Beginning $PRODUCT Zimlet installation"

    startServices
    zimletInstall
  fi

  echo ""
  echo "==========================="
  echo ""
  echo "After installing/uninstalling $PRODUCT Zimlet,"
  echo "it's highly suggested to clear both your browser's and server's cache."
  echo "In order to clear your server's Zimlet cache, simply run"
  echo "« zmprov fc -a zimlet »"
  echo "as the zimbra user."
  echo "E.g. « su - zimbra -c 'zmprov fc -a zimlet' »"
  echo ""
  echo "==========================="
  echo ""

}


coreInstall() {

  echo ""
  verifyExecute "$PRODUCT Core will now be installed. Proceed?" "Y"
  echo ""

  stopServices
  checkOpenChat
  installZextrasCore

  uninstallCredits
  installCredits

  if [[ $PROCESS_MODE != all || $ZIMBRA_ACTIVE != yes ]]; then
    echo ""
    echo "The Zimbra Web Application (mailboxd) is inactive at present."
    inquire "Do you wish to start the Zimbra Web Application (mailboxd)?" "Y"
    if [[ $answer == no ]]; then
      echo "Exiting by user choice."
      exit 1
    fi
  fi

  unset answer

  startZimbra
  echo "Waiting 60s for Zimbra to initialize ..."
  logInfo "Starting mailboxd"
  sleep 60
  isZimbraActive

  if [[ $? -eq 0 ]]; then
    ZIMBRA_STATUS=1
  else
    echo "The Zimbra Web Application failed to start. Exiting ..."
      logErr "Mailboxd failed to start"
    exit 1
  fi

}


zimletInstall() {

  echo ""
  verifyExecute "The $PRODUCT Zimlet will now be installed. Proceed?" "Y"
  echo ""

  installZextrasZimlet

}


coreRemove() {

  verifyExecute "$PRODUCT Core will be removed. Proceed?" "N"
  echo ""
  echo "Uninstalling $PRODUCT Core ..."
  echo ""
  removeZextrasCore
  uninstallCredits
}


zimletRemove() {

  echo ""
  verifyExecute "The $PRODUCT Zimlet will be removed. Proceed?" "N"
  echo ""
  echo "Uninstalling the $PRODUCT Zimlet ..."
  echo ""
  removeZextrasZimlet

}


payloadCheck() {

  if [[ -r $CORE_PACKAGE ]]; then
    CORE_VERSION=`bin/zxtool.sh -p $CORE_PACKAGE -v 2>/dev/null|sed -n 's/.*[^0-9.]\(\([0-9]\{1,\}\.\)\{1,\}[0-9]\{1,\}\).*/\1/p'`
    if [[ -z $CORE_VERSION ]]; then
      echo "Variable CORE_VERSION undefined"
      exit 1
    fi
  else
    if [[ $UNINSTALL != yes ]]; then
     echo "Core Package file $CORE_PACKAGE missing! Exiting..."
     logErr "Core Package file $CORE_PACKAGE missing! Exiting..."
     echo "Most likely your Zimbra version is not yet supported by this install package."
     exit 1
    fi
  fi


  if [[ -r $ZAL_PACKAGE ]]; then

    if validateZalPackage "$ZAL_PACKAGE"; then

      ZAL_PACKAGE_VALID="yes"
      ZAL_PACKAGE_VERSION=`bin/zaltool.sh -p "${ZAL_PACKAGE}" -v`
      ZAL_PACKAGE_VARIANT=`bin/zaltool.sh -p "${ZAL_PACKAGE}" -V`

    else

      logErr "ZAL package $ZAL_PACKAGE found but invalid"
      echo "ZAL package $ZAL_PACKAGE found but invalid"

    fi

    if [[ -n $ZAL_PACKAGE_VALID && $ZAL_PACKAGE_VERSION == +([0-9]).+([0-9]).+([0-9]) && $ZAL_PACKAGE_VARIANT == +([0-9]).+([0-9]).+([0-9]) ]]; then

      local CMP
      CMP=`echo $ZAL_PACKAGE_VERSION $ZAL_MIN_VERSION|bin/check_version.pl`

      logInfo "ZAL package version $ZAL_PACKAGE_VERSION for Zimbra $ZAL_PACKAGE_VARIANT found"

      if [[ $CMP -ge 0 && $ZAL_PACKAGE_VARIANT == ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} ]]; then

        ZAL_PACKAGE_VIABLE="yes"

      fi

    fi

  fi


  if [[ -r $ZIMLET_PACKAGE ]]; then
### TODO
    ZIMLET_VERSION=$CORE_VERSION
    if [[ $UNINSTALL != yes ]]; then
      if [[ -z $ZIMLET_VERSION ]]; then
        echo "Variable ZIMLET_VERSION undefined"
        echo "Most likely your Zimbra version is not yet supported by this install package."
        exit 1
      fi
    fi
  else
    if [[ $UNINSTALL != yes ]]; then
      echo "Zimlet Package file $ZIMLET_PACKAGE missing! Exiting..."
      logErr "Zimlet Package file $ZIMLET_PACKAGE missing! Exiting..."
      exit 1
    fi
  fi

}


preCheck() {
  checkPackageEmpty

  checkExistingZimbraInstall

  getSupportedVersion

  checkMinimumZimbraVersion

  checkSupportedZimbraVersions

  downloadArtifacts

  getMinimumSupportedZalVersion

  #payloadCheck
  CORE_VERSION=`bin/zxtool.sh -p $CORE_PACKAGE -v 2>/dev/null|sed -n 's/.*[^0-9.]\(\([0-9]\{1,\}\.\)\{1,\}[0-9]\{1,\}\).*/\1/p'`

  if [[ $UNINSTALL != yes ]]; then

    isMultiServer

    cat <<EOF

Checking whether you are installing the latest version ...

EOF
    LATEST_VERSION=`bin/check_latest.pl 2>/dev/null`

    echo "Current release: $CORE_VERSION"
    logInfo "Current release: $CORE_VERSION"

    if [[ -n $LATEST_VERSION ]]; then
      logInfo "Found latest Core version: $LATEST_VERSION"
      local COMP
      COMP=`echo $CORE_VERSION $LATEST_VERSION|bin/check_version.pl`
      cat <<EOF
Latest  release: $LATEST_VERSION

For more information check the Changelog at
http://wiki.zextras.com/wiki/Changelog

EOF
      if [[ $COMP -ge 0 ]]; then
        echo "This installer is up to date: version $CORE_VERSION"
      else
        cat <<EOF

***** WARNING *****

This package is not up to date.
Please download the latest version at www.zextras.com .

*******************

EOF
## TEXT TO BE REINSERTED WHEN STABLE
#Otherwise a
#wget http://www.zextras.com/download/zextras_suite-latest.tgz
#will suffice ;)
#
        inquire "Abort current installation?" "Y"
        if [[ $answer == yes ]]; then
          echo "Aborting by user choice."
          exit
        fi
      fi

      unset answer

    else
      cat <<EOF

Unable to check whether you are running the latest
version of this installer.
Please verify whether you have downloaded the latest
version at www.zextras.com .
Otherwise a
wget http://www.zextras.com/download/zextras_suite-latest.tgz
will suffice ;)

Press Enter to continue ...
EOF

      while read -r -t 0; do read -r; done

      read
    fi

  fi

  echo ""
  echo "-------------------------"
  checkZextrasCoreInstall
  checkZalInstall
  checkZextrasZimletInstall
  checkZxMigZimletInstall
  checkZextrasClientInstall
  checkZextrasChatInstall
  echo "-------------------------"
  echo ""
  echo "-------------------------"




  if [[ $CORE_INSTALLED == yes ]]; then
    if [[ $INSTALLED_CORE_ZXMIG == yes ]]; then
      echo "Detected Zextras Migration Tool Core version $INSTALLED_CORE_VERSION"

      CORE_REMOVE="yes"
    else
      echo "Detected $PRODUCT Core version $INSTALLED_CORE_VERSION"
    fi
  else
    echo "No preexistent Core installation found."
  fi

  if [[ $ZXMIG_ZIMLET_INSTALLED == yes ]]; then
    echo "Detected Zextras Migration Tool Zimlet version $INSTALLED_ZXMIG_ZIMLET_VERSION"

    ZXMIG_ZIMLET_REMOVE="yes"

  else
    echo "No preexistent Zextras Migration Tool Zimlet installation found."
  fi

  if [[ $ZEXTRAS_ZIMLET_INSTALLED == yes ]]; then
    echo "Detected $PRODUCT Zimlet version $INSTALLED_ZEXTRAS_ZIMLET_VERSION"
  else
    echo "No preexistent $PRODUCT Zimlet installation found."
  fi

  echo "-------------------------"

  if [[ $UNINSTALL != yes ]]; then
    if [[ $CORE_REMOVE == yes || $ZXMIG_ZIMLET_REMOVE == yes ]]; then

      cat <<EOF

You have components of Zextras Migration Tool installed on your system.
Please remove them before installing $PRODUCT.

EOF
      exit 1

    fi
    if [[ $CORE_DOWNGRADE == yes || $ZEXTRAS_ZIMLET_DOWNGRADE == yes ]]; then

      cat <<EOF

The installed version of some $PRODUCT components
is superior to the one of this installation package.
If you really wish to downgrade please remove the $PRODUCT Components already installed
and rerun this installation script.

EOF
      exit 1

    fi

    acceptLicense
    [[ -e $ZAL_PACKAGE || -e ${CORE_INSTALL_DIR}/$ZAL_JAR ]] || acceptZalLicense

    if [[ $UNINSTALL != yes ]]; then

      cat <<EOF

Checking for the most up-to-date version of the ZAL library...

EOF

      local ZAL_LATEST_VERSION
      ZAL_LATEST_VERSION=`bin/check_zal_latest.pl ${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO} ${ZAL_MIN_MAJOR}.${ZAL_MIN_MINOR} 2>/dev/null`


      logInfo "Found latest ZAL version: «$ZAL_LATEST_VERSION»"

      if [[ $ZAL_LATEST_VERSION == unsupported ]]; then

        cat <<EOF

Your Zimbra version is not yet supported by the ZAL component.
Check http://www.zextras.com/download for further
information.

EOF
        exit 1

      elif [[ $ZAL_LATEST_VERSION == +([0-9]).+([0-9]).+([0-9]) ]]; then

        if [[ -n $ZAL_INSTALLED && -z $ZAL_UPGRADE_NEEDED ]]; then

          local COMP
          COMP=`echo $INSTALLED_ZAL_VERSION $ZAL_LATEST_VERSION|bin/check_version.pl`

          if [[ $COMP -le 0 ]]; then

            ZAL_UPGRADE_DESIRABLE="yes"

          else

            ZAL_UPGRADE_UNNEEDED="yes"

          fi

        else

          if [[ -n $ZAL_PACKAGE_VIABLE ]]; then

            local COMP
            COMP=`echo $ZAL_PACKAGE_VERSION $ZAL_LATEST_VERSION|bin/check_version.pl`

            if [[ $COMP -le 0 ]]; then

              ZAL_UPGRADE_DESIRABLE="yes"

            else

              ZAL_DOWNLOAD_UNNEEDED="yes"

            fi

          fi

        fi

      else

        if [[ ( ( ! -e ${CORE_INSTALL_DIR}/$ZAL_JAR ) && ( ( -r $ZAL_PACKAGE && -z $ZAL_PACKAGE_VIABLE ) || ! -r $ZAL_PACKAGE ) ) || ( -n $ZAL_UPGRADE_NEEDED && ( ( -r $ZAL_PACKAGE && -z $ZAL_PACKAGE_VIABLE ) || ! -r $ZAL_PACKAGE ) ) ]]; then

          cat <<EOF

Unable to automatically determine the latest version of the ZAL library.
Please download the file located at
http://openzal.org/${ZAL_MIN_MAJOR}.${ZAL_MIN_MINOR}/zal-${ZAL_MIN_MAJOR}.${ZAL_MIN_MINOR}-${ZM_CUR_MAJOR}.${ZM_CUR_MINOR}.${ZM_CUR_MICRO}.jar
or check the documentation available at
http://wiki.zextras.com/wiki/Zextras_Suite_ZAL_requirements
about how to find out what's the most appropriate version of
the ZAL library for your environment.

Once you have downloaded the the appropriate file,
rename it as « zal.jar » and place it in the packages subdirectory,
currently located at

`readlink -f packages`

Then, run the installer again.

Exiting ...

EOF
          exit 1

        else

          cat <<EOF

Unable to automatically determine the latest version of the ZAL library.
Please check the documentation available at
http://wiki.zextras.com/wiki/Zextras_Suite_ZAL_requirements
about how to find out what's the most appropriate version of
the ZAL library for your environment.

Press Enter to continue ...

EOF

          while read -r -t 0; do read -r; done

          read

        fi

      fi

    fi

  else
    if [[ $CORE_DOWNGRADE == yes ]]; then
      if [[ $PROCESS_MODE == all || $PROCESS_MODE == core ]]; then
        if [[ $CORE_REMOVE == yes ]]; then
          :
        else
          cat <<EOF

You are trying to uninstall $PRODUCT Core version $INSTALLED_CORE_VERSION .
Please remove it with the installer from $PRODUCT version
$INSTALLED_CORE_VERSION or greater.
The version of this installer is $CORE_VERSION

EOF
          exit 1
        fi
      elif [[ $PROCESS_MODE == zimlet ]]; then
        if [[ $CORE_REMOVE == yes ]]; then
          :
        else
          cat <<EOF

You are trying to uninstall $PRODUCT Zimlet version $INSTALLED_ZEXTRAS_ZIMLET_VERSION .
Please remove it with the installer from $PRODUCT version
$INSTALLED_ZEXTRAS_ZIMLET_VERSION or greater.
The version of this installer is $ZIMLET_VERSION

EOF
          exit 1
        fi
      fi
    fi
  fi

}



ID=`id -u`

if [[ $ID -ne 0 ]]; then
	echo "Run as root!"
	exit 1
fi

if [[ -z $BASH ]]; then
  cat <<EOF

The shell interpreter used to run this script is not bash.
This script is to be run by bash.
Please execute it either as

bash ./install.sh [arguments]

or

./install.sh [arguments]

EOF
  exit 1
fi


. ./libs/functions.sh


while [[ $# -ne 0 ]]; do
	case $1 in
    -u|--uninstall)
      UNINSTALL="yes"
      ;;
    -h|-help|--help)
      usage
      exit 0
      break
      ;;
    -d|--debug)
      set -x
      set -v
      ;;
    core)
      PROCESS_MODE="core"
      break
      ;;
    zimlet)
      PROCESS_MODE="zimlet"
      break
      ;;
    all)
      PROCESS_MODE="all"
      break
      ;;
    *)
      echo "Error: check the invocation parameters."
      usage
      exit 1
      ;;
	esac
	shift
done

if [[ $# -gt 1 ]]; then
  echo "Error: check the invocation parameters."
  usage
  exit 1
fi

if [[ -z $PROCESS_MODE ]]; then
  cat <<EOF
A target for the operations is needed:
either core, zimlet or all
See $0 -h
EOF
  exit 1
fi

. ./libs/variables.sh


logInfo "Command Line: $@"

while :
do
  case $PROCESS_MODE in
    core)
      preCheck
      coreProcess
      break
      ;;
    zimlet)
      preCheck
      zimletProcess
      break
      ;;
    all)
      preCheck
      coreProcess
      zimletProcess
      break
      ;;
  esac
done


# vim:ts=2:sw=2:cindent:et
