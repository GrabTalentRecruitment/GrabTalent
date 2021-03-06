<div class="site-wrapper vert-offset-top-3">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?= lang('siteadminhome.welcomeheader'); ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3 text-left">
                                <img src="/images/icons/candidates.png" alt="" height="65px" />
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $this->db->count_all('candidate_signup'); ?></div>
                                <div><?= lang('siteadminhome.blurblabel1'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="./site_admin/candidate_list">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3 text-left">
                                <img src="/images/icons/employers.png" alt="" height="65px" />
                            </div>
                            <div class="col-xs-9 text-right">
                                <?php 
                                        $this->db->select('COUNT(DISTINCT(employer_name)) as EmpCnt');
                                        $this->db->from('employers');
                                        $query = $this->db->get();
                                        foreach ($query->result_array() as $row) {
                                            $result = $row['EmpCnt'];
                                        }
                                    ?>
                                <div class="huge"><?php echo $result;?></div>
                                <div><?= lang('siteadminhome.blurblabel2'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="./site_admin/employer_list">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3 text-left">
                                <img src="/images/icons/jobs.png" alt="" height="65px" />
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $this->db->count_all('jobs'); ?></div>
                                <div><?= lang('siteadminhome.blurblabel3'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="./site_admin/jobs_list">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <div class="huge">0</div>
                                <div><?= lang('siteadminhome.blurblabel4'); ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i><?= lang('siteadminhome.panel1'); ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <span class="badge">just now</span>
                                <i class="fa fa-fw fa-calendar"></i> Calendar updated
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">4 minutes ago</span>
                                <i class="fa fa-fw fa-comment"></i> Commented on a post
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">23 minutes ago</span>
                                <i class="fa fa-fw fa-truck"></i> Order 392 shipped
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">46 minutes ago</span>
                                <i class="fa fa-fw fa-money"></i> Invoice 653 has been paid
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">1 hour ago</span>
                                <i class="fa fa-fw fa-user"></i> A new user has been added
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">2 hours ago</span>
                                <i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">yesterday</span>
                                <i class="fa fa-fw fa-globe"></i> Saved the world
                            </a>
                            <a href="#" class="list-group-item">
                                <span class="badge">two days ago</span>
                                <i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i><?= lang('siteadminhome.panel2'); ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Candidate Id.</th>
                                        <th>From Stage</th>
                                        <th>To Stage</th>
                                        <th>Changed on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = $this->db->query('SELECT candidate_coderefs_id, candidate_appln_prevstage, candidate_appln_nextstage, candidate_appln_change_date FROM candidate_application_history ORDER BY candidate_appln_change_date DESC LIMIT 5');
                                        foreach ($query->result() as $row) {
                                            echo "<tr>";
                                            echo "<td>".$row->candidate_coderefs_id."</td>";
                                            echo "<td>".$row->candidate_appln_prevstage."</td>";
                                            echo "<td>".$row->candidate_appln_nextstage."</td>";
                                            echo "<td>".date("d-M-Y h:m:s",strtotime($row->candidate_appln_change_date))."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>