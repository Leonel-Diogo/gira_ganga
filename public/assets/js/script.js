
//ESTATÍSTICAS
function mostrarEstatistica(tipo) {
    let conteudo = document.getElementById("estatistica-conteudo");
    let detalhe = document.getElementById("detalhe");
    detalhe.innerHTML = '';
    switch (tipo) {
        case 'classificacao':
            conteudo.innerHTML = `<h4>Classificação</h4>
            <!-- Classificação -->
            <section class="py-5 bg-white" id="ranking">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-law text-white">
                                <tr>
                                    <th>Pos</th>
                                    <th>Time</th>
                                    <th>J</th>
                                    <th>V</th>
                                    <th>E</th>
                                    <th>D</th>
                                    <th>Pts</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1º</td>
                                    <td>Advocacia FC</td>
                                    <td>10</td>
                                    <td>8</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>2º</td>
                                    <td>Jurídicos SC</td>
                                    <td>9</td>
                                    <td>7</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>3º</td>
                                    <td>Juízes FC</td>
                                    <td>8</td>
                                    <td>6</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>19</td>
                                </tr>
                                <tr>
                                    <td>4º</td>
                                    <td>OAB Warriors</td>
                                    <td>8</td>
                                    <td>5</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>17</td>
                                </tr>
                                <tr>
                                    <td>5º</td>
                                    <td>Defensores FC</td>
                                    <td>8</td>
                                    <td>5</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>16</td>
                                </tr>
                                <tr>
                                    <td>6º</td>
                                    <td>Promotores United</td>
                                    <td>8</td>
                                    <td>4</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>7º</td>
                                    <td>Tribunais SP</td>
                                    <td>8</td>
                                    <td>4</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td>8º</td>
                                    <td>Legisladores FC</td>
                                    <td>8</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>11</td>
                                </tr>
                                <tr>
                                    <td>9º</td>
                                    <td>Jurisprudência RJ</td>
                                    <td>8</td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>4</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>10º</td>
                                    <td>Constituição FC</td>
                                    <td>8</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>4</td>
                                    <td>8</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                        </ul>
                    </nav>
                </div>
            </section></p>`;
            break;
        case 'jogadores':
            conteudo.innerHTML = `<h4>Estatísticas dos Jogadores</h4>
                <section class="py-5 bg-white" id="player-stats">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="bg-law text-white">
                                    <tr>
                                        <th>Posição</th>
                                        <th>Jogador</th>
                                        <th>Time</th>
                                        <th>Golos</th>
                                        <th>Assistências</th>
                                        <th>Passes Completos</th>
                                        <th>Faltas Cometidas</th>
                                        <th>Cartões Amarelos</th>
                                        <th>Cartões Vermelhos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1º</td>
                                        <td>João Silva</td>
                                        <td>Advocacia FC</td>
                                        <td>12</td>
                                        <td>6</td>
                                        <td>245</td>
                                        <td>8</td>
                                        <td>3</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>2º</td>
                                        <td>Ricardo Santos</td>
                                        <td>Jurídicos SC</td>
                                        <td>10</td>
                                        <td>8</td>
                                        <td>230</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>3º</td>
                                        <td>Carlos Mendes</td>
                                        <td>Juízes FC</td>
                                        <td>9</td>
                                        <td>5</td>
                                        <td>210</td>
                                        <td>10</td>
                                        <td>4</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>4º</td>
                                        <td>Felipe Costa</td>
                                        <td>OAB Warriors</td>
                                        <td>8</td>
                                        <td>7</td>
                                        <td>195</td>
                                        <td>7</td>
                                        <td>1</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>5º</td>
                                        <td>André Barbosa</td>
                                        <td>Defensores FC</td>
                                        <td>7</td>
                                        <td>4</td>
                                        <td>200</td>
                                        <td>9</td>
                                        <td>3</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>6º</td>
                                        <td>Lucas Pereira</td>
                                        <td>Promotores United</td>
                                        <td>6</td>
                                        <td>6</td>
                                        <td>190</td>
                                        <td>5</td>
                                        <td>2</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>7º</td>
                                        <td>Marcos Lima</td>
                                        <td>Tribunais SP</td>
                                        <td>6</td>
                                        <td>3</td>
                                        <td>185</td>
                                        <td>11</td>
                                        <td>5</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>8º</td>
                                        <td>Eduardo Nogueira</td>
                                        <td>Legisladores FC</td>
                                        <td>5</td>
                                        <td>4</td>
                                        <td>180</td>
                                        <td>8</td>
                                        <td>2</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>9º</td>
                                        <td>Rafael Sousa</td>
                                        <td>Jurisprudência RJ</td>
                                        <td>4</td>
                                        <td>3</td>
                                        <td>170</td>
                                        <td>12</td>
                                        <td>4</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>10º</td>
                                        <td>Bruno Cardoso</td>
                                        <td>Constituição FC</td>
                                        <td>3</td>
                                        <td>5</td>
                                        <td>165</td>
                                        <td>9</td>
                                        <td>3</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>`;
            break;
        case 'calendario':
            conteudo.innerHTML = `<h4>Calendário de jogos - Temporada 2025</h4>
                <p>Próximos jogos dos campeonatos:</p>
                <section class="py-3" id="calendario">
                    <div class="container">
                        <!-- Primeira linha de jogos -->
                        <div class="row g-4 mb-2">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/botafogo.svg" alt="Advocacia FC" width="25">
                                                <h5>Advocacia FC</h5>
                                            </div>
                                            <div class="text-center">
                                                <span class="h4">VS</span>
                                            </div>
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/bragantino.svg" alt="Jurídico SC" width="25">
                                                <h5>Jurídico SC</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-2"></i>15/02/2024 - 15:00
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-2"></i>Estádio Municipal
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/Cuiaba_EC (1).svg" alt="Tribunais FC" width="25">
                                                <h5>Tribunais FC</h5>
                                            </div>
                                            <div class="text-center">
                                                <span class="h4">VS</span>
                                            </div>
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/escudo-vitoria.svg" alt="Direito United"
                                                    width="25">
                                                <h5>Direito United</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-2"></i>16/02/2024 - 18:00
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-2"></i>Arena Legal
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/Flamengo.svg" alt="Defensoria FC" width="25">
                                                <h5>Defensoria FC</h5>
                                            </div>
                                            <div class="text-center">
                                                <span class="h4">VS</span>
                                            </div>
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/fluminense.svg" alt="Justiça RJ" width="25">
                                                <h5>Justiça RJ</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-2"></i>17/02/2024 - 20:00
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-2"></i>Campo dos Juízes
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Segunda linha de jogos -->
                        <div class="row g-4 mb-2">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/Criciuma-2024.svg" alt="Procuradores FC"
                                                    width="25">
                                                <h5>Procuradores FC</h5>
                                            </div>
                                            <div class="text-center">
                                                <span class="h4">VS</span>
                                            </div>
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/cruzeiro_2021.svg" alt="Barra Advogados"
                                                    width="25">
                                                <h5>Barra Advogados</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-2"></i>18/02/2024 - 17:30
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-2"></i>Estádio da Ordem
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/Fortaleza_2021_1.svg" alt="Código FC" width="25">
                                                <h5>Código FC</h5>
                                            </div>
                                            <div class="text-center">
                                                <span class="h4">VS</span>
                                            </div>
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/internacional.svg" alt="Sentença United"
                                                    width="25">
                                                <h5>Sentença United</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-2"></i>19/02/2024 - 14:00
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-2"></i>Foro Arena
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/sao-paulo.svg" alt="Legislativo FC" width="25">
                                                <h5>Legislativo FC</h5>
                                            </div>
                                            <div class="text-center">
                                                <span class="h4">VS</span>
                                            </div>
                                            <div class="text-center">
                                                <img src="assets/img/escudo_times/vasco_SVG.svg" alt="Ministério United" width="25">
                                                <h5>Ministério United</h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-2"></i>20/02/2024 - 19:45
                                            </small>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-2"></i>Tribunal Esportivo
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>`;
            break;
        case 'historico':
            conteudo.innerHTML = `<h4>Histórico da competição</h4>
                <section class="py-3" id="historico">
                    <div class="container">
                        <p>Aqui você encontra informações sobre os campeões e estatísticas das edições anteriores.</p>
                        <div class="row g-4 mb-2">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Últimos Campeões</h5>
                                        <ul>
                                            <li>2024 - Advocacia FC</li>
                                            <li>2023 - Jurídico SC</li>
                                            <li>2022 - Defensoria FC</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Estatísticas</h5>
                                        <p>Maior vencedor: Jurídico SC (3 títulos)</p>
                                        <p>Maior artilheiro: João Silva - 25 gols</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>`;
            break;
    }
}

//NAVEGAÇÃO NO DASHBOARD/Script para alternar a sidebar em telas pequenas
document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os botões de visualização de times
    const viewTeamButtons = document.querySelectorAll('.view-team');

    viewTeamButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Esconde o conteúdo do dashboard
            const dashboardContent = document.querySelector('#estatisticas-page');
            if (dashboardContent) {
                dashboardContent.style.display = 'none';
            }

            // Abre a modal dos times
            const modal = new bootstrap.Modal(document.getElementById('teamDetailsModal'));
            modal.show();
        });
    });
});

