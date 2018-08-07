import os.path
import sys
import json
try:
	import apiai
except ImportError:
     sys.path.append(os.path.join(os.path.dirname(os.path.realpath(__file__)),os.paradir)) 
import apiai
CLIENT_ACCESS_TOKEN="afcb1903d14f4367bc56161ce78dfa9d"
def main():
	ai=apiai.ApiAI(CLIENT_ACCESS_TOKEN)
	while True:
   		request=ai.text_request()
     	request.session_id='i-mabiobrick'
     	print("adfva")
     	request.query=raw_input()
     	print("asdv")
     	print("Me: "+request.query)
     	response=request.getresponse()
     	json_data=json.loads(response.read())
     	#print(response.read())
     	print("AI: "+json_data['result']['fulfillment']['messages'][0]['speech'])
if __name__ == '__main__': 
	 main()
