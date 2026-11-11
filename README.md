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

### Install in Claude Code

```sh
/plugin marketplace add khmuhtadin/api-indonesia-examples
/plugin install api-indonesia --marketplace khmuhtadin/api-indonesia-examples
```

The plugin adds the `api-indonesia` MCP server (`https://mcp.apiindonesia.id/mcp`, 84 tools) plus the `api-indonesia` skill. Sign in with OAuth when Claude Code prompts you, or export `API_INDONESIA_KEY` with a key from https://dashboard.apiindonesia.id before you start a session.

### Install in Hermes Agent

```sh
echo 'API_INDONESIA_KEY=aip_live_xxx' >> ~/.hermes/.env
hermes plugins install https://github.com/khmuhtadin/api-indonesia-examples
hermes plugins enable api-indonesia
```

Portable packages stay disabled until you enable them. In Hermes Desktop you can also paste the key in the plugin's settings form instead of editing `.env`. Start a new session (or run `/reload-mcp`) and the `api-indonesia` MCP tools are available, along with the `api-indonesia:api-indonesia` skill.

Disclosure:

- Every tool call, with its arguments, goes to API Indonesia's hosted server (`mcp.apiindonesia.id`). The tool list is served by that server at runtime.
- Each successful call spends credits from the account that owns the key. Failed calls are free.
- The key is read from `API_INDONESIA_KEY` in your Hermes profile `.env` and sent as an `Authorization: Bearer` header. The package has no local code, runs no shell commands and stores nothing.
- All tools are read-only lookups (data queries, format checks and calculators). None of them change anything in your API Indonesia account.

### Install in Kiro

[![Add to Kiro](https://kiro.dev/images/add-to-kiro.svg)](https://kiro.dev/launch/mcp/add?name=api-indonesia&config=%7B%22url%22%3A%22https%3A%2F%2Fmcp.apiindonesia.id%2Fmcp%22%7D)

Or add it to `.kiro/settings/mcp.json` and sign in when Kiro asks:

```json
{ "mcpServers": { "api-indonesia": { "url": "https://mcp.apiindonesia.id/mcp" } } }
```

### Install in Cline

```bash
cline mcp install api-indonesia --transport http https://mcp.apiindonesia.id/mcp
```

Cline opens an API Indonesia sign-in page to approve access, and the entry is also in the Cline marketplace (cline/marketplace#437).

## What's in the API

30 API products, including:

- Wilayah: 38 provinsi, 514 kabupaten/kota, 7,285 kecamatan, 83,762 desa/kelurahan (Kemendagri codes)
- Kode pos: 83,762 records mapped per desa/kelurahan
- Hari libur nasional and cuti bersama
- Jadwal sholat per kabupaten/kota
- BMKG: gempa terkini, cuaca, peringatan dini
- Sekolah (93,500+ by NPSN), perguruan tinggi (4,200+), rumah sakit (2,900+)
- UMP 1997 to 2026 (all 38 provinces for 2026)
- Kurs, Bank Indonesia exchange rates, Al-Quran, Alkitab, KBBI, plat nomor, halal, BPOM, hijriah, validasi NIK/NPWP/rekening bank, and Rupiah/QRIS utilities

The full endpoint list is in the [OpenAPI spec](https://apiindonesia.id/openapi.json).

## Pricing

API Indonesia is pay per successful call with prepaid credits. New accounts get free signup credits, no credit card needed, and failed requests are not charged. Current rates are on https://apiindonesia.id/#harga.

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

## Privacy and support

- Privacy policy: https://apiindonesia.id/privacy/
- Terms: https://apiindonesia.id/terms/
- Support and data questions: hello@apiindonesia.id

What the package sends: tool calls and their arguments go to the hosted server at `mcp.apiindonesia.id`. No telemetry, no local storage. See the privacy policy for retention and third-party sharing.

## License

MIT for the code in this repository. Data returned by the API comes from its original public sources; see https://apiindonesia.id for details.
