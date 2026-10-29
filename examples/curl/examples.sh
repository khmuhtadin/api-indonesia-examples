#!/usr/bin/env bash
# API Indonesia curl examples. Set API_INDONESIA_KEY first.
set -euo pipefail
BASE="https://use.apiindonesia.id/api/v1"
KEY="${API_INDONESIA_KEY:?Set API_INDONESIA_KEY}"

# List provinces (38)
curl -s -H "x-api-key: $KEY" "$BASE/wilayah/provinsi?per_page=50"

# Regencies/cities in a province (province code 32 = Jawa Barat)
curl -s -H "x-api-key: $KEY" "$BASE/wilayah/provinsi/32/kabupaten"

# Search regions by name
curl -s -H "x-api-key: $KEY" "$BASE/wilayah/search?q=bandung"

# Search postal codes by village name or code
curl -s -H "x-api-key: $KEY" "$BASE/kodepos/search?q=40154"

# National holidays for a year
curl -s -H "x-api-key: $KEY" "$BASE/libur?tahun=2026"

# Daily prayer times for a regency/city (3273 = Kota Bandung)
curl -s -H "x-api-key: $KEY" "$BASE/sholat?kabupaten_id=3273"

# Latest BMKG earthquakes
curl -s -H "x-api-key: $KEY" "$BASE/gempa/terkini"
