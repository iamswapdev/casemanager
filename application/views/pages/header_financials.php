<div class="normalheader transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body pad-b">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>

            <div id="hbreadcrumb" style="margin-top:-10px;" class="pull-right">
                <ol class="hbreadcrumb breadcrumb make-bold">
                    <?php if($Admin){?><li><a class="financials-page" href="<?php echo base_url();?>financials/financial">FINANCIAL</a></li><?php  } ?>
                    
                    <li><a class="reports" href="<?php echo base_url();?>financials/reports">REPORTS</a></li>
                    
                    <?php if($Admin){?><li><a class="rapidFunds" href="<?php echo base_url();?>financials/rapidfunds">RAPID FUNDS</a></li><?php  } ?>
                </ol>
            </div>
            
            
        </div>
    </div>
</div>