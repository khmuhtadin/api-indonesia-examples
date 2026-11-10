# API Indonesia

Use the `api-indonesia` MCP server when a question needs Indonesian public data: administrative regions and postal codes, region boundaries, national holidays and cuti bersama, prayer times and Hijri dates, schools (NPSN), universities, hospitals, BMKG earthquakes/weather/warnings, air quality, Bank Indonesia exchange rates, provincial minimum wage, NIK/NPWP format checks, QRIS parsing, rupiah formatting and terbilang, halal (BPJPH), BPOM, DJKI trademarks, OJK lists, food prices, Transjakarta, KBBI, Al-Quran and Alkitab.

All 84 tools are read-only. Ask for the specific record you need (a place, a date, a code) instead of asking for "everything about" a topic, because each call costs credits.

## Cost

A successful request costs 2 credits (Rp2). Failed requests are not charged. A new account gets 3,000 free credits after email verification, with no card. Say what a request cost once, when the work is done, and do not run paid lookups the question does not need.

## Signing in

Sign-in happens in the person's browser: run `/mcp` in Gemini CLI, choose `api-indonesia`, and approve on the API Indonesia consent page. Or create an API key at https://dashboard.apiindonesia.id and send it as `Authorization: Bearer <key>`.

## Where to read more

- Product and quickstart: https://apiindonesia.id/llms.txt
- Documentation index: https://docs.apiindonesia.id/llms.txt
- OpenAPI document: https://apiindonesia.id/openapi.json
- Examples for curl, JavaScript, Python, PHP, n8n and MCP clients: https://github.com/khmuhtadin/api-indonesia-examples
