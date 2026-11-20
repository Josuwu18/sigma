const selectCarrera = document.getElementById("selectCarrera");
const contenedorPensum = document.getElementById("contenedorPensum");
const alerta = document.getElementById("alerta");
const btnConsultar = document.getElementById("btnConsultar");

function mostrarError(msg) {
  alerta.textContent = msg;
  alerta.classList.remove("d-none");
}

async function cargarCarreras() {
  try {
    const res = await fetch(`${API_BASE}/carreras`, {
      headers: { "Accept": "application/json" }
    });
    if (!res.ok) throw new Error(`HTTP ${res.status}`);
    const json = await res.json();

    selectCarrera.innerHTML = '<option value="">-- Elige una carrera --</option>';
    json.data.forEach(c => {
      selectCarrera.innerHTML += `<option value="${c.id}">[${c.codigo}] ${c.nombre}</option>`;
    });
  } catch (err) {
    selectCarrera.innerHTML = '<option value="">Error al cargar carreras</option>';
    mostrarError("No se pudo conectar con Laravel: " + err.message);
  }
}

async function cargarPensum() {
  const id = selectCarrera.value;
  if (!id) return;

  alerta.classList.add("d-none");
  contenedorPensum.innerHTML = `
    <div class="text-center py-4">
      <div class="spinner-border text-primary" role="status"></div>
    </div>
  `;

  try {
    const res = await fetch(`${API_BASE}/carreras/${id}/pensum`, {
      headers: { "Accept": "application/json" }
    });
    if (!res.ok) throw new Error(`HTTP ${res.status}`);
    const json = await res.json();

    contenedorPensum.innerHTML = `<h5 class="mb-3 text-secondary fw-bold">${json.carrera.nombre}</h5>`;

    json.pensum.forEach(sem => {
      let filas = "";
      sem.materias.forEach(m => {
        const badgesPrelacion = m.prelaciones.length > 0
          ? m.prelaciones.map(p => `<span class="badge bg-warning text-dark badge-prelacion d-block mb-1 text-start text-wrap">${p}</span>`).join("")
          : '<span class="text-muted small">Sin prelación</span>';

        filas += `
          <tr>
            <td class="fw-bold text-nowrap">${m.codigo}</td>
            <td>
              <div>${m.nombre}</div>
              <small class="text-muted">${m.tipo}</small>
            </td>
            <td class="text-center"><span class="badge bg-secondary">${m.uc} UC</span></td>
            <td>${badgesPrelacion}</td>
          </tr>
        `;
      });

      contenedorPensum.innerHTML += `
        <div class="card card-semestre shadow-sm mb-4">
          <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span class="fw-bold">${sem.semestre}</span>
            <span class="badge bg-info text-dark">Total: ${sem.total_uc} UC</span>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th>Código</th>
                  <th>Asignatura</th>
                  <th class="text-center">Créditos</th>
                  <th>Prelaciones</th>
                </tr>
              </thead>
              <tbody>${filas}</tbody>
            </table>
          </div>
        </div>
      `;
    });
  } catch (err) {
    contenedorPensum.innerHTML = "";
    mostrarError("Error al obtener el pensum: " + err.message);
  }
}

btnConsultar.addEventListener("click", cargarPensum);
selectCarrera.addEventListener("change", cargarPensum);

cargarCarreras();