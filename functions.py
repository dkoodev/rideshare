# ! /usr/bin/python

# import webbrowser
import sys
import json
import time
# import googlemaps
# from datetime import datetime
# from googlemaps import distance_matrix
# from test import test_distance_matrix

# gmaps = googlemaps.Client(key='AIzaSyAJ_0Uy4w3qTnmYQCnGZZIcHQk5Hu9j4MA')

print "hello"
# test_basic_params()

# Load the data that PHP sent us
try:
data = json.loads(sys.argv[1])
except:
    print "ERROR"
    sys.exit(1)

# Generate some data to send to PHP
result = {'status': 'Yes!'}

# print json.dumps(data[1]['place_id'])

# gmaps_result = distance_matrix(gmaps, data[1]['place_id'],data[2]['place_id'],"driving" )
# print json.dumps(gmaps_result)





# Send it to stdout (to PHP)
print json.dumps(result)