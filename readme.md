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

4) Install the cam_motion service

A) Transfer the cam_motion file over to your home diretory
B) Copy to inid.d
	sudo cp ./cam_motion /etc/init.d/cam_motion
C) Enable the startup service
	sudo cp ./cam_motion /etc/init.d/cam_motion
d) Enable the MODPROBE, if required
	sudo nano /etc/rc.local
	Add the following line to the file: sudo modprobe bcm2835-v4l2
	press ctrl + o to save
	press ctrl + x to quite nano
	
Tips and tricks

A) To restart your pi
	sudo shutdown -r now
	
B) To shutdown your pi
	sudo shutdown -h now
	
C) Inital upgrades

	sudo apt-get update
	sudo apt-get upgrade
	
D) PI Configuration

	sudo raspi-config