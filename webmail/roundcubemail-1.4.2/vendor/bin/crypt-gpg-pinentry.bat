@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../pear/crypt_gpg/scripts/crypt-gpg-pinentry
php "%BIN_TARGET%" %*
