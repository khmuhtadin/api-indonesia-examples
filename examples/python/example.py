"""API Indonesia with requests.

pip install requests
API_INDONESIA_KEY=YOUR_API_KEY python example.py
"""
import os

import requests

BASE = "https://use.apiindonesia.id/api/v1"
KEY = os.environ["API_INDONESIA_KEY"]

session = requests.Session()
session.headers["x-api-key"] = KEY


def get(path, **params):
    r = session.get(BASE + path, params=params, timeout=30)
    r.raise_for_status()
    return r.json()


provinsi = get("/wilayah/provinsi", per_page=50)
print("Provinces:", len(provinsi.get("data", [])))

for kab in get("/wilayah/provinsi/32/kabupaten").get("data", []):
    print(kab["id"], kab["name"])

print(get("/kodepos/search", q="40154"))
print(get("/sholat", kabupaten_id="3273"))
print(get("/gempa/terkini"))
