# n8n

API Indonesia has a community node for n8n: [`n8n-nodes-api-indonesia`](https://www.npmjs.com/package/n8n-nodes-api-indonesia).

Self-hosted n8n:

1. Settings > Community Nodes > Install
2. Enter `n8n-nodes-api-indonesia` and confirm
3. Add an "API Indonesia" credential with your API key from https://dashboard.apiindonesia.id

You can also call the REST API from a plain HTTP Request node: method GET, URL `https://use.apiindonesia.id/api/v1/libur?tahun=2026`, and a header `x-api-key` set from a credential (Header Auth), not hard-coded.
