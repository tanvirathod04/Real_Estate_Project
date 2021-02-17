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
use IO::Handle;
use LWP::UserAgent;

my $url = shift;

my $path = shift;

my $ua = LWP::UserAgent->new;

$ua->timeout(10);

$ua->env_proxy;

if ( $ua->can( 'show_progress' ) ) {
  $ua->show_progress(1);
}

my $response = $ua->get($url);

if ($response->is_success) {
    open my $fd, ">", $path or die "Errore $@";
    print $fd $response->decoded_content;
} else {
    die $response->status_line;
}


# vim:ts=2:sw=2:cindent:et
