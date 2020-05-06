
<h1> HOME - GESTION BIOMED</h1>

<div class="row justify-content-md-center mt-5">
    <?php foreach($stats as $key => $value): ?>
        
        <div class="col-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $key ?></h6>
                </div>
            
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class="">

                                </div>
                            </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class="">
                            </div>
                        </div>
                    </div>

                    <canvas class="CircleJS" Number="5" width="486" height="245" class="chartjs-render-monitor" style="display: block; width: 486px; height: 245px;">
                    TEST     
                    </canvas>
                    
                </div>
                </div>
            </div>  
        </div>
    <?php endforeach;?>
</div>