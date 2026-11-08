# API Indonesia examples

Code examples for [API Indonesia](https://apiindonesia.id), a REST API and MCP server for Indonesian public data, built by Khaisa Studio (Khairul Muhtadin).

- Website: https://apiindonesia.id
- Docs: https://docs.apiindonesia.id
- OpenAPI spec: https://apiindonesia.id/openapi.json
- Base URL: `https://use.apiindonesia.id/api/v1`
- MCP server (streamable HTTP): `https://mcp.apiindonesia.id/mcp` (official MCP Registry name `id.apiindonesia/api-indonesia`)
- Dashboard (get an API key): https://dashboard.apiindonesia.id
- RapidAPI: https://rapidapi.com/contactmuhtadin/api/api-indonesia
- Postman workspace: https://www.postman.com/contactmuhtadin-185774/api-indonesia/overview
- n8n community node: [`n8n-nodes-api-indonesia`](https://www.npmjs.com/package/n8n-nodes-api-indonesia)
- Command-line client: [`api-indonesia-cli`](https://github.com/khmuhtadin/api-indonesia-cli) (`npx -y github:khmuhtadin/api-indonesia-cli --help`)

## Agent skill and plugin

This repo is also an installable agent package:

- **Agent skill** at [`skills/api-indonesia/SKILL.md`](skills/api-indonesia/SKILL.md). Install it into Claude Code, Codex, Cursor and other agents with `npx skills add khmuhtadin/api-indonesia-examples`.
- **MCP config** in [`mcp.json`](mcp.json) (Agent Plugins v1) and [`.mcp.json`](.mcp.json) (Claude Code). Both read your key from the `API_INDONESIA_KEY` environment variable.
- **Plugin manifest** in [`plugin.json`](plugin.json) and [`.claude-plugin/plugin.json`](.claude-plugin/plugin.json).

### Install in Hermes Agent

```sh
echo 'API_INDONESIA_KEY=aip_live_xxx' >> ~/.hermes/.env
hermes plugins install https://github.com/khmuhtadin/api-indonesia-examples
hermes plugins enable api-indonesia
```

Portable packages stay disabled until you enable them. In Hermes Desktop you can also paste the key in the plugin's settings form instead of editing `.env`. Start a new session (or run `/reload-mcp`) and the `api-indonesia` MCP tools are available, along with the `api-indonesia:api-indonesia` skill.

Disclosure:

- Every tool call, with its arguments, goes to API Indonesia's hosted server (`mcp.apiindonesia.id`). The tool list is served by that server at runtime.
- Each successful call spends 2 credits (Rp2) from the account that owns the key. Failed calls are free.
- The key is read from `API_INDONESIA_KEY` in your Hermes profile `.env` and sent as an `Authorization: Bearer` header. The package has no local code, runs no shell commands and stores nothing.
- All tools are read-only lookups (data queries, format checks and calculators). None of them change anything in your API Indonesia account.

## What's in the API

30 API products, including:

- Wilayah: 38 provinsi, 514 kabupaten/kota, 7,285 kecamatan, 83,762 desa/kelurahan (Kemendagri codes)
- Kode pos: 83,762 records mapped per desa/kelurahan
- Hari libur nasional and cuti bersama
- Jadwal sholat per kabupaten/kota
- BMKG: gempa terkini, cuaca, peringatan dini
- Sekolah (93,500+ by NPSN), perguruan tinggi (4,600+), rumah sakit (2,900+)
- UMP 1997 to 2026 (all 38 provinces for 2026)
- Kurs, Bank Indonesia exchange rates, Al-Quran, Alkitab, KBBI, plat nomor, halal, BPOM, hijriah, validasi NIK/NPWP/rekening bank, and Rupiah/QRIS utilities

The full endpoint list is in the [OpenAPI spec](https://apiindonesia.id/openapi.json).

## Pricing

There is no monthly free tier. New accounts get a one-time 3,000 credit signup bonus (1 credit = Rp1), no credit card needed. A successful data request costs 2 credits (Rp2); failed requests are not charged.

## Authentication

Send your key in the `x-api-key` header:

```bash
curl -H "x-api-key: YOUR_API_KEY" https://use.apiindonesia.id/api/v1/wilayah/provinsi
```

The MCP server takes the same key as a bearer token: `Authorization: Bearer YOUR_API_KEY`.

Never commit a real key. The examples read it from the `API_INDONESIA_KEY` environment variable.

## Examples

| Folder | What it shows |
|---|---|
| [examples/curl](examples/curl) | Shell requests for wilayah, kode pos, hari libur, jadwal sholat, gempa |
| [examples/javascript](examples/javascript) | `fetch` (Node 18+ or browser) |
| [examples/python](examples/python) | `requests` |
| [examples/php](examples/php) | cURL extension, no dependencies |
| [examples/n8n](examples/n8n) | Using the n8n community node |
| [examples/mcp](examples/mcp) | Claude Desktop and Cursor config for the MCP server |

[`server.json`](server.json) is the same entry published to the official MCP Registry.

## License

MIT for the code in this repository. Data returned by the API comes from its original public sources; see https://apiindonesia.id for details.
