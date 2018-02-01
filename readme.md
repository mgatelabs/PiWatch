Pi-Watch

Utility to remote control garage doors, and see your cameras

Notes:

0) Most of this originated from the following web page, but I've evolved it a bit

https://www.raspberrypi.org/forums/viewtopic.php?t=182136

1) The camera doesn't work, no/gray video signal

For the camera to work I tried the following command.  Test the command first and if its successful added to command to the file /etc/rc.local

sudo modprobe bcm2835-v4l2

Answer found at: https://raspberrypi.stackexchange.com/questions/60669/unable-to-open-video-device

2) Dealing with system services

https://www.digitalocean.com/community/tutorials/how-to-use-systemctl-to-manage-systemd-services-and-units

3) To install motion on stretch

sudo apt-get install motion