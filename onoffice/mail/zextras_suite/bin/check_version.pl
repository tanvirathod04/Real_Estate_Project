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

$_ = <>;
chomp;

(my $a, my $b) = split;
my @a = split /\./,$a;
my @b = split /\./,$b;

my $max_index = $#a < $#b ? $#a : $#b;

$#a = $max_index;
$#b = $max_index;

for (0..$#a)
{
  my $cmp = $a[$_] <=> $b[$_];
  print $cmp and exit if ($cmp or $_ == $#a);
}


# vim:ts=2:sw=2:cindent:et
