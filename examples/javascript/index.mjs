// API Indonesia with fetch (Node 18+ or any modern browser).
// Run: API_INDONESIA_KEY=YOUR_API_KEY node index.mjs
const BASE = "https://use.apiindonesia.id/api/v1";
const KEY = process.env.API_INDONESIA_KEY;
if (!KEY) throw new Error("Set API_INDONESIA_KEY");

async function get(path, params = {}) {
  const url = new URL(BASE + path);
  for (const [k, v] of Object.entries(params)) url.searchParams.set(k, v);
  const res = await fetch(url, { headers: { "x-api-key": KEY } });
  if (!res.ok) throw new Error(`${res.status} ${await res.text()}`);
  return res.json();
}

const provinsi = await get("/wilayah/provinsi", { per_page: 50 });
console.log("Provinces:", provinsi.data?.length);

const kabupaten = await get("/wilayah/provinsi/32/kabupaten");
console.log("Jawa Barat regencies/cities:", kabupaten.data?.map((k) => k.name));

const kodepos = await get("/kodepos/search", { q: "40154" });
console.log("Kode pos:", kodepos.data);

const libur = await get("/libur", { tahun: 2026 });
console.log("Holidays 2026:", libur.data);
