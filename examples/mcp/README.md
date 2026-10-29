# MCP server

API Indonesia runs a remote MCP server over streamable HTTP:

- URL: `https://mcp.apiindonesia.id/mcp`
- Header: `Authorization: Bearer YOUR_API_KEY`
- Official MCP Registry name: `id.apiindonesia/api-indonesia`

## Cursor

Put [`cursor_mcp.json`](cursor_mcp.json) in `~/.cursor/mcp.json` (global) or `.cursor/mcp.json` (project) and replace `YOUR_API_KEY`.

## Claude Desktop

Claude Desktop's config file launches local commands, so [`claude_desktop_config.json`](claude_desktop_config.json) uses [`mcp-remote`](https://www.npmjs.com/package/mcp-remote) to bridge to the remote server. Merge it into `claude_desktop_config.json` and replace `YOUR_API_KEY`. On paid Claude plans you can also add it as a custom connector with the URL above.

## Other clients

Any client that supports streamable HTTP with custom headers works with the same URL and header.
