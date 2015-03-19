import bluetooth as bt

def calculate_light_pos(num):
    # TODO
    if num == 1:
        return (-1000, 500, 2000)
    elif num == 2:
        return (-1000, 500, 1000)
    elif num == 3:
        return (-500, -500, 500)
    elif num == 4:
        return (500, -500, 500)
    elif num == 5:
        return (500, 0, 750)
    elif num == 6:
        return (500, 0, 1000)
    elif num == 7:
        return (500, 0, 2000)
    # elif num == 8:
    #     return (0, 0, 0)
    else:
        return (0, 0, 0)

class Light:
    """A class to interact with Bluetooth SIGMusic lights"""

    def __init__(self, address, num):
        """ Constructor """
        self.num = num
        self.is_connected = False
        self.pos = calculate_light_pos(num)

        if bt.is_valid_address(address):
            self.endpoint = address
        else:
            raise ValueError("invalid Bluetooth address")
            return
        self.socket = self.connect_light()
        self.rgb = (0,0,0)

    def __del__(self):
        """ Destructor """
        self.disconnect_light()

    def connect_light(self):
        """ Initiates the socket connection """
        # Should be using L2CAP because it is similar to UDP,
        # but it's only available on Linux. We want it to transmit RGB
        # data in real time, dropping packets if necessary. Order matters.
        # port = bt.get_available_port(bt.L2CAP) # Deprecated
        port = 1

        # Create the socket
        sock = bt.BluetoothSocket(bt.RFCOMM)
        
        # Attempt to connect
        try:
            sock.connect((self.endpoint, port))
        except:
            print("Could not connect to light", self.num)
            return
        self.is_connected = True

        return sock

    def disconnect_light(self):
        """ Closes the socket connection """
        if self.is_connected:
            # Close the socket gracefully
            self.socket.close()
        
        # Don't try to use the socket again
        self.socket = None

    def send_rgb(self, red, green, blue):
        """ Sends RGB values """
        if self.is_connected:
            checksum = (red + green + blue) % 256
            message = bytes([ord("S"), ord("I"), ord("G"), ord("M"), red, green, blue, checksum])
            self.socket.send(message)
            self.rgb = (red, green, blue)
