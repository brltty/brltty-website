The <CODE>bp2cf</CODE> (boot parameter to configuration file) script
in BRLTTY's <CODE>Bootdisks</CODE> subdirectory
converts BRLTTY's current boot parameter into configuration file directives.
If the special file <CODE>/proc/cmdline</CODE> exists
then the <CODE>brltty=</CODE> boot parameter specified therein is used.
If it doesn't exist then the <CODE>brltty</CODE> environment variable is used.
If BRLTTY's boot parameter hasn't been specified then this script doesn't do anything.
<P>
This script accepts the following options:
<DL>
<DT>-f <I>file</I><DD>
Specify the path (relative or absolute) of the configuration file to be created/updated.
If this option isn't supplied then this script functions as a filter, i.e.
input is read from standard input
and output is written to standard output.
<DT>-c<DD>
Create the configuration file (no input is read).
The created configuration file contains only those directives
for which a boot operand has been specified.
<DT>-u<DD>
Update the configuration file.
Only those directives already in the configuration file
for which a boot operand has been specified
are updated.
Each such directive is uncommented if necessary.
<DT>-n<DD>
Do not do any device path translation.
<DT>-d<DD>
Translate from old-style to devfs device paths.
<DT>-o<DD>
Translate from devfs to old-style device paths.
<DT>-p <I>parameter</I><DD>
Explicitly specify the boot parameter.
While there may be more imaginative uses for this option,
it's main purpose is to make it easy to test the script.
<DT>-h<DD>
Display a command line usage summary and then exit.
</DL>
The <CODE>-c</CODE> and <CODE>-u</CODE> options are mutually exclusive;
the default is <CODE>-c</CODE>.
The <CODE>-n</CODE>, <CODE>-d</CODE> and <CODE>-o</CODE> options are mutually exclusive;
the default is <CODE>-n</CODE>.
No other options have default values.
The default function of this script, therefore, is to write to standard output
those configuration directives which correspond to each specified boot operand.
<P>
We recommend that distributions use this script
within their BRLTTY package's installation processing
in order to automatically preconfigure BRLTTY during
<A HREF="#install">system installation</A>.
The <CODE>bp2cf</CODE> script which comes with the release of BRLTTY being packaged should be used.
Copying portions of the script, rather than the whole script,
into the package definition is a bad idea since:
<UL>
<LI>It's an error prone practice.
<LI>The internal structure of the script may change significantly from release to release.
<LI>Fixes and enhancements can easily get missed.
</UL>
<P>
Including the whole script is problematic for packages like rpms
wherein special package installation code can only be added
via scriptlets contained within a larger package definition file.
The main problem is that the <CODE>exit</CODE> within <CODE>bp2cf</CODE>
causes the installation scriptlet to terminate prematurely.
Here, to stimulate your imagination and inventiveness,
is how we do it for BRLTTY's rpm (as of release <CODE>3.3</CODE>).
<P>
<PRE>
%pre
# The pre-install scriptlet.

# If a configuration file already exists then rpm installs the new one as
# &lt;path&gt;.rpmnew. If this is done then the .rpmnew file is overwritten if it
# already exists.

# There's no explicit way to tell if a configuration file has been installed
# as itself or as a .rpmnew file. The way we'll figure it out, therefore, is by
# erasing the .rpmnew file now so that we can see if it gets created later. 
rm -f /etc/brltty.conf.rpmnew

%post
# The post-install scriptlet.

# If BRLTTY's boot parameter has been specified then update the just installed
# configuration file template to reflect the options supplied thereby.

# First, we need to determine which file to update. If there's a .rpmnew file
# then update it since a previous configuration file must already have existed.
file=/etc/brltty.conf
new=$file.rpmnew
[ -f $new ] && file=$new

# Update the configuration file template via the Bootdisks/bp2cf script.
# Include it right within this scriptlet so that it needn't be installed.
# Embed it within a subshell to ensure that it won't impact this scriptlet.
(
   # First, set bp2cf's command line arguments.
   set -- -u -f $file

   # Now run it by simply embedding it right here.
)
</PRE>
