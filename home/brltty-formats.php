<p>
<b>BRLTTY</b> and <b>BrlAPI</b> can be downloaded in various archive formats.
These formats can be identified by their file extensions.
</p>

<p>
Source archives, which contain everything, include:
</p>

<dl>
   <dt>.src.rpm</dt>
   <dd>
      The format used for building binary packages for platforms such as
      <b>Red Hat</b> and <b>Fedora</b>.
   </dd>

   <dt>.tar.gz</dt>
   <dd>A <b>tar</b> archive compressed via <b>gzip</b>.</dd>

   <dt>.tar.xz</dt>
   <dd>A <b>tar</b> archive compressed via <b>xz</b>.</dd>
</dl>

<p>
Binary formats which contain a full build include:
</p>

<dl>
   <dt>.apk</dt>
   <dd>An Android package.</dd>

   <dt>.exe</dt>
   <dd>A Windows installer.</dd>

   <dt>.zip</dt>
   <dd>
      A full build for a Microsoft platform.
      If the file name begins with <code>brltty-win-</code>
      then it's for Windows.
      If the file name is <code>brltty</code><i>nn</i>
      (or, in some cases, <code>brltt</code><i>nnn</i>)
      then it's for DOS.
   </dd>
</dl>

<p>
There are two variants for each
Windows installer (.exe)
and Windows binary archive (.zip).
This is necessary because there are two ways to access USB devices on Windows.
</p>

<dl>
   <dt>LibUSB</dt>
   <dd>
      The older, Win32-based interface.
      The version component of the file name ends with <code>-libusb</code>.
   </dd>

   <dt>LibUSB-1.0</dt>
   <dd>
      The newer, WinUSB-based interface.
      The version component of the file name ends with <code>-libusb-1.0</code>.
   </dd>
</dl>

<p>
Binary builds for some distributions are split into several packages
in order to facilitate minimizing the dependency on external components.
Binary formats for these partial-build packages include:
</p>

<dl>
   <dt>.i386.rpm</dt>
   <dd>
      A 32-bit Intel 386-compatible package for platforms such as
      <b>Red Hat</b> and <b>Fedora</b>.
   </dd>

   <dt>.i686.rpm</dt>
   <dd>
      A 32-bit Intel 686-compatible package for platforms such as
      <b>Red Hat</b> and <b>Fedora</b>.
   </dd>

   <dt>.noarch.rpm</dt>
   <dd>
      An architecture-independent package for platforms such as
      <b>Red Hat</b> and <b>Fedora</b>.
   </dd>

   <dt>.x86_64.rpm</dt>
   <dd>
      A 64-bit Intel package for platforms such as
      <b>Red Hat</b> and <b>Fedora</b>.
   </dd>
</dl>

<p>
Partial build packages include:
</p>

<dl>
   <dt>brlapi</dt>
   <dd>The <b>BrlAPI</b> client library.</dd>

   <dt>brlapi-devel</dt>
   <dd>
      C headers and a run-time library that facilitate
      software development using <b>BrlAPI</b> client code.
   </dd>

   <dt>brlapi-java</dt>
   <dd>Java bindings for <b>BrlAPI</b>.</dd>

   <dt>brlapi-ocaml</dt>
   <dd>OCaml bindings for <b>BrlAPI</b>.</dd>

   <dt>brlapi-python</dt>
   <dd>Python bindings for <b>BrlAPI</b>.</dd>

   <dt>brlapi-tcl</dt>
   <dd>TCL bindings for <b>BrlAPI</b>.</dd>

   <dt>brlapi-utils</dt>
   <dd>Commands that perform various <b>BrlAPI</b>-related functions.</dd>

   <dt>brltty</dt>
   <dd>
      The core,
      braille and speech drivers that have no external dependencies,
      the Linux screen driver,
      and the BrlAPI server.
   </dd>

   <dt>brltty-braille-brlapi</dt>
   <dd>The <b>BrlAPI</b> braille driver.</dd>

   <dt>brltty-braille-xwindow</dt>
   <dd>The <b>XWindow</b> braille driver.</dd>

   <dt>brltty-devel</dt>
   <dd>
      C headers and a run-time library that facilitate
      software development using <b>BRLTTY</b> code.
   </dd>

   <dt>brltty-screen-atspi</dt>
   <dd>The <b>AtSpi</b> screen driver.</dd>

   <dt>brltty-screen-atspi2</dt>
   <dd>The <b>AtSpi2</b> screen driver.</dd>

   <dt>brltty-screen-screen</dt>
   <dd>The <b>Screen</b> screen driver.</dd>

   <dt>brltty-speech-espeak</dt>
   <dd>The <b>eSpeak</b> speech driver.</dd>

   <dt>brltty-speech-festival</dt>
   <dd>The <b>Festival</b> speech driver.</dd>

   <dt>brltty-speech-flite</dt>
   <dd>The <b>Festival Lite</b> speech driver.</dd>

   <dt>brltty-speech-speechd</dt>
   <dd>The <b>Speech Dispatcher</b> speech driver.</dd>

   <dt>brltty-systemd</dt>
   <dd>Units that allow <b>BRLTTY</b> processes to be managed by <b>Systemd</b>.</dd>

   <dt>brltty-udev</dt>
   <dd>Rules that allow <b>BRLTTY</b> processes to be managed by <b>Udev</b>.</dd>

   <dt>brltty-utils</dt>
   <dd>Commands that perform various <b>BRLTTY</b>-related functions.</dd>
</dl>
