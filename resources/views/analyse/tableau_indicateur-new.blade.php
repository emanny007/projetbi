<br /><br />
<header>
    <center><img src="/images/icon/logoLogin.jpg" width="750%" height="300%"/></center>
</header>
<!-- MAIN CONTENT-->
<div class="uker">
                <div class="col-md-12">

                        <h3 class="title-2 m-b-40">TABLEAU DES INDICATEURS CLES DES FILIALES DU GROUPE COFINA</h3>
                        <br />
                        <div class="table-responsive">
                            <table  width=70% border ="1"class="table">
                              <thead>
                                <tr bgcolor="#ff4848">
                                  <th> <center>LIBELLE-KPI'S</center></th>
                                  <th> <center>CTI</center></th>
                                  <th> <center>CAC</center></th>
                                  <th> <center>COFINA SN</center></th>
                                  <th> <center>CSG</center></th>
                                  <th> <center>COFINA ML</center></th>
                                  <th> <center>COFINA CG</center></th>
                                  <th> <center>COFINA GN</center></th>
                                  <th> <center>COFINA BF</center></th>
                                  <th> <center>CSF</center></th>
                                  <th> <center>FINELLE</center></th>
                                  <th> <center>CPS SN</center></th>
                                  <th> <center>CPS CI</center></th>
                                  <th> <center>CPS ML</center></th>
                                  <th> <center>TOTAL</center></th>
                                </tr>
                                <tr bgcolor="#DCDCDC">
                                  <th>Distribution effectif par Genre </th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                  <th> <center>NBRE</center></th>
                                </tr>

                              </thead>
                                <tbody>
                                  <tr>
                                      <td>HOMMES</td>
                                      <td align='center'>{{ count($hommes) }}</td>
                                      <td align='center'>{{ count($hommes_cac) }}</td>
                                      <td align='center'>{{ count($hommes_cfnsn) }}</td>
                                      <td align='center'>{{ count($hommes_csg) }}</td>
                                      <td align='center'>{{ count($hommes_cfml) }}</td>
                                      <td align='center'>{{ count($hommes_cg) }}</td>
                                      <td align='center'>{{ count($hommes_gn) }}</td>
                                      <td align='center'>{{ count($hommes_bf) }}</td>
                                      <td align='center'>{{ count($hommes_csf) }}</td>

                                      <td align='center'>{{ count($hommes_fnl) }}</td>
                                      <td align='center'>{{ count($hommes_cpssn) }}</td>
                                      <td align='center'>{{ count($hommes_cpsci) }}</td>
                                      <td align='center'>{{ count($hommes_cpsml) }}</td>
                                      <td align='center'>{{ count($hommes_tot) }}</td>

                                  </tr>
                                  <tr>
                                      <td>FEMMES</td>
                                      <td align='center'>{{ count($femmes) }} </td>
                                      <td align='center'>{{ count($femmes_cac) }}</td>
                                      <td align='center'>{{ count($femmes_cfnsn) }}</td>
                                      <td align='center'>{{ count($femmes_csg) }}</td>
                                      <td align='center'>{{ count($femmes_cfml) }}</td>
                                      <td align='center'>{{ count($femmes_cg) }}</td>
                                      <td align='center'>{{ count($femmes_gn) }}</td>
                                      <td align='center'>{{ count($femmes_bf) }}</td>
                                      <td align='center'>{{ count($femmes_csf) }}</td>
                                      <!--td align='center'> </td-->
                                      <td align='center'>{{ count($femmes_fnl) }}</td>
                                      <td align='center'>{{ count($femmes_cpssn) }}</td>
                                      <td align='center'>{{ count($femmes_cpsci) }}</td>
                                      <td align='center'>{{ count($femmes_cpsml) }}</td>
                                      <td align='center'>{{ count($femmes_tot) }}</td>
                                  </tr>
                                  <tr>

                                      <td>TOTAL</td>
                                      <td align='center'>{{ count($employes) }}</td>
                                      <td align='center'>{{ count($employes_cac) }}</td>
                                      <td align='center'>{{ count($employes_cfnsn) }}</td>
                                      <td align='center'>{{ count($employes_csg) }}</td>
                                      <td align='center'>{{ count($employes_cfml) }}</td>
                                      <td align='center'>{{ count($employes_cg) }}</td>
                                      <td align='center'>{{ count($employes_gn) }}</td>
                                      <td align='center'>{{ count($employes_bf) }}</td>
                                      <td align='center'>{{ count($employes_csf) }}</td>
                                      <!--td align='center'>100</td-->
                                      <td align='center'>{{ count($employes_fnl) }}</td>
                                      <td align='center'>{{ count($employes_cpssn) }}</td>
                                      <td align='center'>{{ count($employes_cpsci) }}</td>
                                      <td align='center'>{{ count($employes_cpsml) }}</td>
                                      <td align='center'>{{ count($employes_tot) }}</td>

                                  </tr>

                                  <tr>

                                    <td>AGE MOYEN</td>
                                      @foreach($age_employes as $age_employes)
                                        <td align='center'>{{round($age_employes->age_moyen) }}</td>
                                      @endforeach

                                      @foreach($age_employes_cac as $age_employes_cac)
                                        <td align='center'>{{round($age_employes_cac->age_moyen) }}</td>
                                      @endforeach

                                      @foreach($age_employes_cfnsn as $age_employes_cfnsn)
                                        <td align='center'>{{$age_employes_cfnsn->age_moyen }}</td>
                                      @endforeach

                                      @foreach($age_employes_csg as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach

                                      @foreach($age_employes_cfml as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach

                                      @foreach($age_employes_cg as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach

                                      @foreach($age_employes_gn as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach
                                      @foreach($age_employes_bf as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach
                                      @foreach($age_employes_csf as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach
                                      @foreach($age_employes_fnl as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach
                                      @foreach($age_employes_cpssn as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach
                                      @foreach($age_employes_cpsci as $age_employes)
                                        <td align='center'>{{$age_employes->age_moyen }}</td>
                                      @endforeach
                                      @foreach($age_employes_cpsml as $age_employes)
                                        <td align='center'>{{ $age_employes->age_moyen }}</td>
                                      @endforeach
                                      @foreach($age_employes_tot as $age_employes)
                                        <td align='center'>{{round($age_employes->age_moyen) }}</td>
                                      @endforeach

                                  </tr>


                                  <tr bgcolor="#DCDCDC">
                                    <th colspan="15">Distribution effectif par type de Contrat </th>
                                  </tr>
                                  <tr>
                                      <td>CDI</td>
                                      <td align='center'> {{count($nb_cdi) }} </td>
                                      <td align='center'> {{count($nb_cdi_cac) }} </td>
                                      <td align='center'> {{count($nb_cdi_cfnsn) }} </td>
                                      <td align='center'> {{count($nb_cdi_csg) }} </td>
                                      <td align='center'> {{count($nb_cdi_cfml) }} </td>
                                      <td align='center'> {{count($nb_cdi_cg) }} </td>
                                      <td align='center'> {{count($nb_cdi_gn) }} </td>
                                      <td align='center'> {{count($nb_cdi_bf) }} </td>
                                      <td align='center'> {{count($nb_cdi_csf) }} </td>
                                      <td align='center'> {{count($nb_cdi_fnl) }} </td>
                                      <td align='center'> {{count($nb_cdi_cpssn) }} </td>
                                      <td align='center'> {{count($nb_cdi_cpsci) }} </td>
                                      <td align='center'> {{count($nb_cdi_cpsml) }} </td>
                                      <td align='center'> {{count($nb_cdi_tot) }} </td>

                                  </tr>
                                  <tr>
                                      <td>CDD</td>
                                      <td align='center'> {{ count($nb_cdd) }} </td>
                                      <td align='center'> {{ count($nb_cdd_cac) }} </td>
                                      <td align='center'> {{ count($nb_cdd_cfnsn) }} </td>
                                      <td align='center'> {{ count($nb_cdd_csg) }} </td>
                                      <td align='center'> {{ count($nb_cdd_cfml) }} </td>
                                      <td align='center'> {{ count($nb_cdd_cg) }} </td>
                                      <td align='center'> {{ count($nb_cdd_gn) }} </td>
                                      <td align='center'> {{ count($nb_cdd_bf) }} </td>
                                      <td align='center'> {{ count($nb_cdd_csf) }} </td>
                                      <td align='center'> {{ count($nb_cdd_fnl) }} </td>
                                      <td align='center'> {{ count($nb_cdd_cpssn) }} </td>
                                      <td align='center'> {{ count($nb_cdd_cpsci) }} </td>
                                      <td align='center'> {{ count($nb_cdd_cpsml) }} </td>
                                      <td align='center'> {{ count($nb_cdd_tot) }} </td>

                                  </tr>
                                  <tr>
                                      <td>STAGE</td>
                                      <td align='center'> {{ count($nb_stage) }} </td>
                                      <td align='center'> {{ count($nb_stage_cac) }} </td>
                                      <td align='center'> {{ count($nb_stage_cfnsn) }} </td>
                                      <td align='center'> {{ count($nb_stage_csg) }} </td>
                                      <td align='center'> {{ count($nb_stage_cfml) }} </td>
                                      <td align='center'> {{ count($nb_stage_cg) }} </td>
                                      <td align='center'> {{ count($nb_stage_gn) }} </td>
                                      <td align='center'> {{ count($nb_stage_bf) }} </td>
                                      <td align='center'> {{ count($nb_stage_csf) }} </td>
                                      <td align='center'> {{ count($nb_stage_fnl) }} </td>
                                      <td align='center'> {{ count($nb_stage_cpssn) }} </td>
                                      <td align='center'> {{ count($nb_stage_cpsci) }} </td>
                                      <td align='center'> {{ count($nb_stage_cpsml) }} </td>
                                      <td align='center'> {{ count($nb_stage_tot) }} </td>

                                  </tr>
                                  <tr>
                                      <td>PRESTATION</td>
                                      <td align='center'> {{ count($nb_prestation) }} </td>
                                      <td align='center'> {{ count($nb_prestation_cac) }} </td>
                                      <td align='center'> {{ count($nb_prestation_cfnsn) }} </td>
                                      <td align='center'> {{ count($nb_prestation_csg) }} </td>
                                      <td align='center'> {{ count($nb_prestation_cfml) }} </td>
                                      <td align='center'> {{ count($nb_prestation_cg) }} </td>
                                      <td align='center'> {{ count($nb_prestation_gn) }} </td>
                                      <td align='center'> {{ count($nb_prestation_bf) }} </td>
                                      <td align='center'> {{ count($nb_prestation_csf) }} </td>
                                      <td align='center'> {{ count($nb_prestation_fnl) }} </td>
                                      <td align='center'> {{ count($nb_prestation_cpssn) }} </td>
                                      <td align='center'> {{ count($nb_prestation_cpsci) }} </td>
                                      <td align='center'> {{ count($nb_prestation_cpsml) }} </td>
                                      <td align='center'> {{ count($nb_prestation_tot) }} </td>

                                  </tr>
                                  <tr>
                                      <td>TOTAL</td>
                                      <td align='center'>{{count($employes)}}</td>
                                      <td align='center'>{{count($employes_cac)}}</td>
                                      <td align='center'>{{count($employes_cfnsn)}}</td>
                                      <td align='center'>{{count($employes_csg)}}</td>
                                      <td align='center'>{{count($employes_cfml)}}</td>
                                      <td align='center'>{{count($employes_cg)}}</td>
                                      <td align='center'>{{count($employes_gn)}}</td>
                                      <td align='center'>{{count($employes_bf)}}</td>
                                      <td align='center'>{{count($employes_csf)}}</td>
                                      <td align='center'>{{count($employes_fnl)}}</td>
                                      <td align='center'>{{count($employes_cpssn)}}</td>
                                      <td align='center'>{{count($employes_cpsci)}}</td>
                                      <td align='center'>{{count($employes_cpsml)}}</td>
                                      <td align='center'>{{count($employes_tot)}}</td>


                                  </tr>
                                  <tr bgcolor="#DCDCDC">
                                    <th colspan="15">Distribution effectif par Departement </th>
                                  </tr>

                                <tr>
                                    <td>AUDIT </td>
                                    <td align='center'> {{ count($dpt_audit) }}</td>

                                    <td align='center'> {{ count($dpt_audit_cac) }}</td>
                                    <td align='center'> {{ count($dpt_audit_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_audit_csg) }}</td>
                                    <td align='center'> {{ count($dpt_audit_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_audit_cg) }}</td>
                                    <td align='center'> {{ count($dpt_audit_gn) }}</td>
                                    <td align='center'> {{ count($dpt_audit_bf) }}</td>
                                    <td align='center'> {{ count($dpt_audit_csf) }}</td>
                                    <td align='center'> {{ count($dpt_audit_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_audit_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_audit_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_audit_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_audit_tot) }}</td>



                                </tr>
                                <tr>
                                    <td>CONTROLE INTERNE </td>
                                    <td align='center'> {{ count($dpt_ci) }}</td>
                                    <td align='center'> {{ count($dpt_ci_cac) }}</td>
                                    <td align='center'> {{ count($dpt_ci_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_ci_csg) }}</td>
                                    <td align='center'> {{ count($dpt_ci_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_ci_cg) }}</td>
                                    <td align='center'> {{ count($dpt_ci_gn) }}</td>
                                    <td align='center'> {{ count($dpt_ci_bf) }}</td>
                                    <td align='center'> {{ count($dpt_ci_csf) }}</td>
                                    <td align='center'> {{ count($dpt_ci_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_ci_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_ci_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_ci_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_ci_tot) }}</td>


                                </tr>
                                <tr>
                                    <td>CREDIT </td>
                                    <td align='center'> {{ count($dpt_credit) }}</td>
                                    <td align='center'> {{ count($dpt_credit_cac) }}</td>
                                    <td align='center'> {{ count($dpt_credit_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_credit_csg) }}</td>
                                    <td align='center'> {{ count($dpt_credit_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_credit_cg) }}</td>
                                    <td align='center'> {{ count($dpt_credit_gn) }}</td>
                                    <td align='center'> {{ count($dpt_credit_bf) }}</td>
                                    <td align='center'> {{ count($dpt_credit_csf) }}</td>
                                    <td align='center'> {{ count($dpt_credit_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_credit_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_credit_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_credit_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_credit_tot) }}</td>
                                </tr>

                                <tr>
                                    <td>DIRECTION </td>
                                    <td align='center'> {{ count($dpt_d) }}</td>
                                    <td align='center'> {{ count($dpt_d_cac) }}</td>
                                    <td align='center'> {{ count($dpt_d_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_d_csg) }}</td>
                                    <td align='center'> {{ count($dpt_d_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_d_cg) }}</td>
                                    <td align='center'> {{ count($dpt_d_gn) }}</td>
                                    <td align='center'> {{ count($dpt_d_bf) }}</td>
                                    <td align='center'> {{ count($dpt_d_csf) }}</td>
                                    <td align='center'> {{ count($dpt_d_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_d_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_d_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_d_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_d_tot) }}</td>
                                </tr>

                                <tr>
                                    <td>DIRECTION GENERALE</td>
                                    <td align='center'> {{ count($dpt_dg) }}</td>
                                    <td align='center'> {{ count($dpt_dg_cac) }}</td>
                                    <td align='center'> {{ count($dpt_dg_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_dg_csg) }}</td>
                                    <td align='center'> {{ count($dpt_dg_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_dg_cg) }}</td>
                                    <td align='center'> {{ count($dpt_dg_gn) }}</td>
                                    <td align='center'> {{ count($dpt_dg_bf) }}</td>
                                    <td align='center'> {{ count($dpt_dg_csf) }}</td>
                                    <td align='center'> {{ count($dpt_dg_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_dg_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_dg_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_dg_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_dg_tot) }}</td>

                                </tr>

                                <tr>
                                    <td>DMCC</td>
                                    <td align='center'> {{ count($dpt_dmcc) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_cac) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_csg) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_cg) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_gn) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_bf) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_csf) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_dmcc_tot) }}</td>

                                </tr>

                                <tr>
                                    <td>EXPLOITATION</td>
                                    <td align='center'> {{ count($dpt_expl) }}</td>
                                    <td align='center'> {{ count($dpt_expl_cac) }}</td>
                                    <td align='center'> {{ count($dpt_expl_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_expl_csg) }}</td>
                                    <td align='center'> {{ count($dpt_expl_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_expl_cg) }}</td>
                                    <td align='center'> {{ count($dpt_expl_gn) }}</td>
                                    <td align='center'> {{ count($dpt_expl_bf) }}</td>
                                    <td align='center'> {{ count($dpt_expl_csf) }}</td>
                                    <td align='center'> {{ count($dpt_expl_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_expl_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_expl_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_expl_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_expl_tot) }}</td>


                                </tr>

                                <tr>
                                    <td>FACILITIES </td>
                                    <td align='center'> {{ count($dpt_facilitie) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_cac) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_csg) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_cg) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_gn) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_bf) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_csf) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_facilitie_tot) }}</td>

                                </tr>

                                <tr>
                                    <td>FINANCE </td>
                                    <td align='center'> {{ count($dpt_finance) }}</td>
                                    <td align='center'> {{ count($dpt_finance_cac) }}</td>
                                    <td align='center'> {{ count($dpt_finance_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_finance_csg) }}</td>
                                    <td align='center'> {{ count($dpt_finance_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_finance_cg) }}</td>
                                    <td align='center'> {{ count($dpt_finance_gn) }}</td>
                                    <td align='center'> {{ count($dpt_finance_bf) }}</td>
                                    <td align='center'> {{ count($dpt_finance_csf) }}</td>
                                    <td align='center'> {{ count($dpt_finance_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_finance_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_finance_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_finance_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_finance_tot) }}</td>


                                </tr>

                                <tr>
                                    <td>INFORMATIQUE</td>
                                    <td align='center'> {{ count($dpt_informatique) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_cac) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_csg) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_cg) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_gn) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_bf) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_csf) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_informatique_tot) }}</td>


                                </tr>

                                <tr>
                                    <td>LEGAL</td>
                                    <td align='center'> {{ count($dpt_legal) }}</td>
                                    <td align='center'> {{ count($dpt_legal_cac) }}</td>
                                    <td align='center'> {{ count($dpt_legal_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_legal_csg) }}</td>
                                    <td align='center'> {{ count($dpt_legal_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_legal_cg) }}</td>
                                    <td align='center'> {{ count($dpt_legal_gn) }}</td>
                                    <td align='center'> {{ count($dpt_legal_bf) }}</td>
                                    <td align='center'> {{ count($dpt_legal_csf) }}</td>
                                    <td align='center'> {{ count($dpt_legal_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_legal_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_legal_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_legal_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_legal_tot) }}</td>
                                </tr>

                                <tr>
                                    <td>OPERATIONS</td>
                                    <td align='center'> {{ count($dpt_ops) }}</td>
                                    <td align='center'> {{ count($dpt_ops_cac) }}</td>
                                    <td align='center'> {{ count($dpt_ops_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_ops_csg) }}</td>
                                    <td align='center'> {{ count($dpt_ops_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_ops_cg) }}</td>
                                    <td align='center'> {{ count($dpt_ops_gn) }}</td>
                                    <td align='center'> {{ count($dpt_ops_bf) }}</td>
                                    <td align='center'> {{ count($dpt_ops_csf) }}</td>
                                    <td align='center'> {{ count($dpt_ops_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_ops_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_ops_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_ops_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_ops_tot) }}</td>
                                </tr>

                                <tr>
                                    <td>PHOENIX</td>
                                    <td align='center'> {{ count($dpt_phoenix) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_cac) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_csg) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_cg) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_gn) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_bf) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_csf) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_phoenix_tot) }}</td>

                                </tr>

                                <tr>
                                    <td>RESSOURCES HUMAINES</td>
                                    <td align='center'> {{ count($dpt_rh) }}</td>
                                    <td align='center'> {{ count($dpt_rh_cac) }}</td>
                                    <td align='center'> {{ count($dpt_rh_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_rh_csg) }}</td>
                                    <td align='center'> {{ count($dpt_rh_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_rh_cg) }}</td>
                                    <td align='center'> {{ count($dpt_rh_gn) }}</td>
                                    <td align='center'> {{ count($dpt_rh_bf) }}</td>
                                    <td align='center'> {{ count($dpt_rh_csf) }}</td>
                                    <td align='center'> {{ count($dpt_rh_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_rh_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_rh_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_rh_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_rh_tot) }}</td>


                                </tr>

                                <tr>
                                    <td>RETAIL</td>
                                    <td align='center'> {{ count($dpt_retail) }}</td>
                                    <td align='center'> {{ count($dpt_retail_cac) }}</td>
                                    <td align='center'> {{ count($dpt_retail_cfnsn) }}</td>
                                    <td align='center'> {{ count($dpt_retail_csg) }}</td>
                                    <td align='center'> {{ count($dpt_retail_cfml) }}</td>
                                    <td align='center'> {{ count($dpt_retail_cg) }}</td>
                                    <td align='center'> {{ count($dpt_retail_gn) }}</td>
                                    <td align='center'> {{ count($dpt_retail_bf) }}</td>
                                    <td align='center'> {{ count($dpt_retail_csf) }}</td>
                                    <td align='center'> {{ count($dpt_retail_fnl) }}</td>
                                    <td align='center'> {{ count($dpt_retail_cpssn) }}</td>
                                    <td align='center'> {{ count($dpt_retail_cpsci) }}</td>
                                    <td align='center'> {{ count($dpt_retail_cpsml) }}</td>
                                    <td align='center'> {{ count($dpt_retail_tot) }}</td>

                                </tr>


                                <tr bgcolor="#DCDCDC">
                                  <th colspan="15">Distribution effectif par Genre et par Categorie </th>
                                </tr>
                                <tr>

                                    <td>HOMMES CADRES</td>
                                    <td align='center'> {{ count($hommes_cadres) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_cac) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_cfnsn) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_csg) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_cfml) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_cg) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_gn) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_bf) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_csf) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_fnl) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_cpssn) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_cpsci) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_cpsml) }} </td>
                                    <td align='center'> {{ count($hommes_cadres_tot) }} </td>


                                </tr>
                                <tr>

                                    <td>HOMMES NON CADRES</td>
                                    <td align='center'> {{ count($hommes_noncadres) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_cac) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_cfnsn) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_csg) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_cfml) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_cg) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_gn) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_bf) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_csf) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_fnl) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_cpssn) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_cpsci) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_cpsml) }} </td>
                                    <td align='center'> {{ count($hommes_noncadres_tot) }} </td>
                                    <!--td align='center'> </td-->

                                </tr>
                                <tr>

                                    <td>FEMMMES CADRES</td>
                                    <td align='center'> {{ count($femmes_cadres) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_cac) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_cfnsn) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_csg) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_cfml) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_cg) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_gn) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_bf) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_csf) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_fnl) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_cpssn) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_cpsci) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_cpsml) }} </td>
                                    <td align='center'> {{ count($femmes_cadres_tot) }} </td>


                                </tr>
                                <tr>
                                    <td>FEMMES NON CADRES</td>
                                    <td align='center'> {{ count($femmes_noncadres) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_cac) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_cfnsn) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_csg) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_cfml) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_cg) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_gn) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_bf) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_csf) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_fnl) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_cpssn) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_cpsci) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_cpsml) }} </td>
                                    <td align='center'> {{ count($femmes_noncadres_tot) }} </td>
                                    <!--td align='center'> </td-->
                                </tr>

                                <tr bgcolor="#DCDCDC">
                                  <th colspan="15">Distribution effectif des departs </th>
                                </tr>
                                <tr>
                                    <td>DEMISSION </td>
                                    <td align='center'> {{ count($depart_demission) }}</td>
                                    <td align='center'> {{ count($depart_demission_cac) }}</td>
                                    <td align='center'> {{ count($depart_demission_cfnsn) }}</td>
                                    <td align='center'> {{ count($depart_demission_csg) }}</td>
                                    <td align='center'> {{ count($depart_demission_cfml) }}</td>
                                    <td align='center'> {{ count($depart_demission_cg) }}</td>
                                    <td align='center'> {{ count($depart_demission_gn) }}</td>
                                    <td align='center'> {{ count($depart_demission_bf) }}</td>
                                    <td align='center'> {{ count($depart_demission_csf) }}</td>
                                    <td align='center'> {{ count($depart_demission_fnl) }}</td>
                                    <td align='center'> {{ count($depart_demission_cpssn) }}</td>
                                    <td align='center'> {{ count($depart_demission_cpsci) }}</td>
                                    <td align='center'> {{ count($depart_demission_cpsml) }}</td>
                                    <td align='center'> {{ count($depart_demission_tot) }}</td>
                                </tr>
                                <tr>
                                    <td>DEPART NEGOCIE </td>
                                    <td align='center'> {{ count($depart_negocie) }}</td>
                                    <td align='center'> {{ count($depart_negocie_cac) }}</td>
                                    <td align='center'> {{ count($depart_negocie_cfnsn) }}</td>
                                    <td align='center'> {{ count($depart_negocie_csg) }}</td>
                                    <td align='center'> {{ count($depart_negocie_cfml) }}</td>
                                    <td align='center'> {{ count($depart_negocie_cg) }}</td>
                                    <td align='center'> {{ count($depart_negocie_gn) }}</td>
                                    <td align='center'> {{ count($depart_negocie_bf) }}</td>
                                    <td align='center'> {{ count($depart_negocie_csf) }}</td>
                                    <td align='center'> {{ count($depart_negocie_fnl) }}</td>
                                    <td align='center'> {{ count($depart_negocie_cpssn) }}</td>
                                    <td align='center'> {{ count($depart_negocie_cpsci) }}</td>
                                    <td align='center'> {{ count($depart_negocie_cpsml) }}</td>
                                    <td align='center'> {{ count($depart_negocie_tot) }}</td>
                                </tr>

                                <tr>
                                    <td>FIN CDD </td>
                                    <td align='center'> {{ count($depart_fincdd) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_cac) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_cfnsn) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_csg) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_cfml) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_cg) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_gn) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_bf) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_csf) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_fnl) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_cpssn) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_cpsci) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_cpsml) }}</td>
                                    <td align='center'> {{ count($depart_fincdd_tot) }}</td>
                                </tr>

                                <tr>
                                    <td>FIN STAGE </td>
                                    <td align='center'> {{ count($depart_finstage) }}</td>
                                    <td align='center'> {{ count($depart_finstage_cac) }}</td>
                                    <td align='center'> {{ count($depart_finstage_cfnsn) }}</td>
                                    <td align='center'> {{ count($depart_finstage_csg) }}</td>
                                    <td align='center'> {{ count($depart_finstage_cfml) }}</td>
                                    <td align='center'> {{ count($depart_finstage_cg) }}</td>
                                    <td align='center'> {{ count($depart_finstage_gn) }}</td>
                                    <td align='center'> {{ count($depart_finstage_bf) }}</td>
                                    <td align='center'> {{ count($depart_finstage_csf) }}</td>
                                    <td align='center'> {{ count($depart_finstage_fnl) }}</td>
                                    <td align='center'> {{ count($depart_finstage_cpssn) }}</td>
                                    <td align='center'> {{ count($depart_finstage_cpsci) }}</td>
                                    <td align='center'> {{ count($depart_finstage_cpsml) }}</td>
                                    <td align='center'> {{ count($depart_finstage_tot) }}</td>
                                </tr>
                                <tr>
                                    <td>LICENCIEMENT</td>
                                    <td align='center'> {{ count($depart_licenciement) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_cac) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_cfnsn) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_csg) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_cfml) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_cg) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_gn) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_bf) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_csf) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_fnl) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_cpssn) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_cpsci) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_cpsml) }}</td>
                                    <td align='center'> {{ count($depart_licenciement_tot) }}</td>
                                </tr>
                                <tr>
                                    <td>RETRAITRE</td>
                                    <td align='center'> {{ count($depart_retraite) }}</td>
                                    <td align='center'> {{ count($depart_retraite_cac) }}</td>
                                    <td align='center'> {{ count($depart_retraite_cfnsn) }}</td>
                                    <td align='center'> {{ count($depart_retraite_csg) }}</td>
                                    <td align='center'> {{ count($depart_retraite_cfml) }}</td>
                                    <td align='center'> {{ count($depart_retraite_cg) }}</td>
                                    <td align='center'> {{ count($depart_retraite_gn) }}</td>
                                    <td align='center'> {{ count($depart_retraite_bf) }}</td>
                                    <td align='center'> {{ count($depart_retraite_csf) }}</td>
                                    <td align='center'> {{ count($depart_retraite_fnl) }}</td>
                                    <td align='center'> {{ count($depart_retraite_cpssn) }}</td>
                                    <td align='center'> {{ count($depart_retraite_cpsci) }}</td>
                                    <td align='center'> {{ count($depart_retraite_cpsml) }}</td>
                                    <td align='center'> {{ count($depart_retraite_tot) }}</td>
                                </tr>
                                <tr bgcolor="#DCDCDC">
                                  <th colspan="15">Distribution effectif des sanctions </th>
                                </tr>

                                <tr>
                                    <td>AVERTISSEMENT</td>
                                    <td align='center'> {{ count($sanction_avert) }}</td>
                                    <td align='center'> {{ count($sanction_avert_cac) }}</td>
                                    <td align='center'> {{ count($sanction_avert_cfnsn) }}</td>
                                    <td align='center'> {{ count($sanction_avert_csg) }}</td>
                                    <td align='center'> {{ count($sanction_avert_cfml) }}</td>
                                    <td align='center'> {{ count($sanction_avert_cg) }}</td>
                                    <td align='center'> {{ count($sanction_avert_gn) }}</td>
                                    <td align='center'> {{ count($sanction_avert_bf) }}</td>
                                    <td align='center'> {{ count($sanction_avert_csf) }}</td>
                                    <td align='center'> {{ count($sanction_avert_fnl) }}</td>
                                    <td align='center'> {{ count($sanction_avert_cpssn) }}</td>
                                    <td align='center'> {{ count($sanction_avert_cpsci) }}</td>
                                    <td align='center'> {{ count($sanction_avert_cpsml) }}</td>
                                    <td align='center'> {{ count($sanction_avert_tot) }}</td>
                                </tr>

                                <tr>
                                    <td>BLAME</td>
                                    <td align='center'> {{ count($sanction_blame) }}</td>
                                    <td align='center'> {{ count($sanction_blame_cac) }}</td>
                                    <td align='center'> {{ count($sanction_blame_cfnsn) }}</td>
                                    <td align='center'> {{ count($sanction_blame_csg) }}</td>
                                    <td align='center'> {{ count($sanction_blame_cfml) }}</td>
                                    <td align='center'> {{ count($sanction_blame_cg) }}</td>
                                    <td align='center'> {{ count($sanction_blame_gn) }}</td>
                                    <td align='center'> {{ count($sanction_blame_bf) }}</td>
                                    <td align='center'> {{ count($sanction_blame_csf) }}</td>
                                    <td align='center'> {{ count($sanction_blame_fnl) }}</td>
                                    <td align='center'> {{ count($sanction_blame_cpssn) }}</td>
                                    <td align='center'> {{ count($sanction_blame_cpsci) }}</td>
                                    <td align='center'> {{ count($sanction_blame_cpsml) }}</td>
                                    <td align='center'> {{ count($sanction_blame_tot) }}</td>
                                </tr>

                                <tr>
                                    <td>MISE A PIED</td>
                                    <td align='center'> {{ count($sanction_map) }}</td>
                                    <td align='center'> {{ count($sanction_map_cac) }}</td>
                                    <td align='center'> {{ count($sanction_map_cfnsn) }}</td>
                                    <td align='center'> {{ count($sanction_map_csg) }}</td>
                                    <td align='center'> {{ count($sanction_map_cfml) }}</td>
                                    <td align='center'> {{ count($sanction_map_cg) }}</td>
                                    <td align='center'> {{ count($sanction_map_gn) }}</td>
                                    <td align='center'> {{ count($sanction_map_bf) }}</td>
                                    <td align='center'> {{ count($sanction_map_csf) }}</td>
                                    <td align='center'> {{ count($sanction_map_fnl) }}</td>
                                    <td align='center'> {{ count($sanction_map_cpssn) }}</td>
                                    <td align='center'> {{ count($sanction_map_cpsci) }}</td>
                                    <td align='center'> {{ count($sanction_map_cpsml) }}</td>
                                    <td align='center'> {{ count($sanction_map_tot) }}</td>
                                </tr>
                                <tr>
                                    <td>LICENCIEMENT</td>
                                    <td align='center'> {{ count($sanction_licenciement) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_cac) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_cfnsn) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_csg) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_cfml) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_cg) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_gn) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_bf) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_csf) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_fnl) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_cpssn) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_cpsci) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_cpsml) }}</td>
                                    <td align='center'> {{ count($sanction_licenciement_tot) }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                      </div>
                  </div>
