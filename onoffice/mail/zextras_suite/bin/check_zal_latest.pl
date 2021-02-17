#!/usr/bin/env perl
#
# ***** BEGIN LICENSE BLOCK *****
# Copyright (C) 2014 ZeXtras
#
# The contents of this file are subject to the ZeXtras License;
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
# https://www.zextras.com/eula/
#
# Software distributed under the License is distributed on an "AS IS"
# basis, WITHOUT WARRANTY OF ANY KIND, either express or implied.
# ***** END LICENSE BLOCK *****
#

use strict;
use warnings;
use utf8;
use lib '/opt/zimbra/zimbramon/lib';
use lib '/opt/zimbra/common/lib/perl5';
use LWP::Simple;

my $variant = shift;
my $branch = shift;

my $url='http://update.zextras.com/doCheckUpdate?last_release=zal&zimbra='.$variant."&branch=".$branch;

my $version = get $url;

print $version =~ /^(?:[0-9]+\.[0-9]+\.[0-9]+|unsupported)$/ ? $version : "";


# vim:ts=2:sw=2:cindent:et
