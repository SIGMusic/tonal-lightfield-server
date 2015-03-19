import bluetooth as bt
from light import Light
import colorsys
from time import sleep

# Stores each light
lights = {}

def find_lights():
    """ Finds nearby lights and adds them to the dictionary """
    print("Discovering devices...")
    nearby_devices = bt.discover_devices()

    for address in nearby_devices:
        name = bt.lookup_name(address)
        # Ignore non-lights
        if name.startswith("Light"):
            # Get the light number from the name
            num = int(name[-2:])
            # Check to see if we already found the light
            if not num in lights:
                # Create a light object
                print("Found light", num)
                lights[num] = Light(address, num)
            elif not lights[num].is_connected:
                # We found the light, but it wasn't able to connect. Try again
                print("Attempting to reconnect light", num)
                lights[num].connect_light()

    # Figure out how many lights are connected
    count = 0
    for light in lights:
        if lights[light].is_connected:
            count += 1
    
    if count == 0:
        print("No lights are connected!")
    return count

def cycle_hue():
    """Cycles the hue of each light"""
    while True:
        count = 0
        for light in lights:
            if lights[light].is_connected:
                count += 1
                # Test all lights by cycling the hue
                for hue in [x/256 for x in range(0, 255)]:
                    rgb = colorsys.hsv_to_rgb(hue, 1, 1)
                    lights[light].send_rgb(int(255*rgb[0]), int(255*rgb[1]), int(255*rgb[2]))
        if count == 0:
            print("No connected lights. Quitting.")
            quit()

def test_rgb():
    """ Tests each channel of each light sequentially """
    while True:
        for light in lights:
            if lights[light].is_connected:
                print("Testing light", light)
                print("Red")
                lights[light].send_rgb(255, 0, 0)
                sleep(1)
                print("Green")
                lights[light].send_rgb(0, 255, 0)
                sleep(1)
                print("Blue")
                lights[light].send_rgb(0, 0, 255)
                sleep(1)
                lights[light].send_rgb(0, 0, 0)


# Wait until at least one light has been discovered
while not find_lights():
    pass

# test_rgb()
# cycle_hue()
