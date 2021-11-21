    <div style="margin-left: 10px; margin-right: 10px">   
      <!-- <div class="content-head col-12" style="margin-bottom: 10px;">
        <div class = "pull-left">
            <h4 class="heading">
              <i class="fa fa-home"></i>
              <?= __(' Dashboard') ?></h4>
        </div>
        <div class = "pull-right">
           <?= $this->Html->link(__(' Setup'), ['controller'=>'Pages', 'action' => 'setup'], ['class' => 'btn btn-success fa fa-cubes']) ?>
        </div>
      </div> -->

      <!-- <div class="row" style="margin: 0px !important;">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-bell"></i></span>
            <div class="info-box-content">
              <div class="position-relative bg-light">
                <div class="text-center">
                  <p style="font-size: 15px; margin: 0">Announcements & News </p>
                </div>
                <div class="text-center">
                  <span style="font-style: italic; font-size: 13px;">
                    <?php echo $announcement_title; ?>
                  </span>
                  <p class="lead font-weight-normal text-muted">
                    <?php echo $announcement_body; ?>
                  </p>
                  <p class="lead font-weight-normal text-muted">
                    <?php echo $announcement_date; ?>
                  </p>
                  <p class="lead font-weight-normal text-muted">
                    <?= $this->Html->link(__('Coming soon'), ['controller'=>'Announcements', 'action' => 'view', $announcement_id], ['class' => 'btn btn-outline-secondary']) ?>  
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>  

      </div> -->

      <div class="row home" style="margin:0px !important;">

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Students</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link($studentsTotal, ['controller'=>'Students', 'action' => 'index']) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-landmark"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Classes</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link($classesTotal, ['controller'=>'Classrooms', 'action' => 'index']) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fas fa-book-reader"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Subjects</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link($subjectsTotal, ['controller'=>'Subjects', 'action' => 'index']) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

      </div>

      <div class="row" style="margin: 0px !important;">

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="far fa-file-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Exams</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link($examsTotal, ['controller'=>'Exams', 'action' => 'index']) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Fees</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link('View', ['controller'=>'Fees', 'action' => 'index']) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-bell"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Announcements & Events</span>
              <span class="info-box-number">
                <small class="badge badge-pill badge-success ml-2">
                  <?= $this->Html->link($announcementsTotal, ['controller'=>'Announcements', 'action' => 'index']) ?>
                </small>
              </span>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
          <div class="col-12" style="margin-bottom: 20px">
            <div class="card border-primary flex-fill">
              <div class="card-header info-box-text text-muted"><span class="far fa-calendar-alt"></span> Calendar</div>
              <div style="margin: 20px">
                <div id='calendar' style="width: 100%; display: inline-block;"></div>
              </div>
             </div>
          </div>
        </div>

    </div>