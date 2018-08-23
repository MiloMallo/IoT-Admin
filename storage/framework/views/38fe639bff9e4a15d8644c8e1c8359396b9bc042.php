<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(Admin::user()->avatar); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(Admin::user()->name); ?></p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('admin.online')); ?></a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">主控导航</li>
            <li class="active">
                <a href="<?php echo e(admin_base_path('/')); ?>">
                    <i class="fa fa-dashboard"></i> <span>数据图表</span>
                </a>
            </li>
            
                <?php if(!Admin::user()->roles()->where('id',1)->get()->isEmpty()): ?>
                
                    <li>
                        <a href="<?php echo e(admin_base_path('auth/users')); ?>">
                            <i class="fa fa-pie-chart"></i>
                            <span>用户管理</span>
                        </a>
                    </li>
                <?php endif; ?>
            
            <li>
                <a href="<?php echo e(admin_base_path('/warehouses')); ?>">
                    <i class="fa fa-pie-chart"></i>
                    <span>仓库管理</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(admin_base_path('/products')); ?>">
                    <i class="fa fa-pie-chart"></i>
                    <span>产品管理</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(admin_base_path('/tags')); ?>">
                    <i class="fa fa-pie-chart"></i>
                    <span>标签操作</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-th"></i> <span>数据分析</span>
                    <small class="label pull-right bg-green">new</small>
                </a>
            </li>
            <li>
                <a href="<?php echo e(admin_base_path('/auth/logs')); ?>">
                    <i class="fa fa-files-o"></i>
                    <span>日志记录</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>操作指南</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(admin_base_path('/tasks')); ?>">
                    <i class="fa fa-envelope"></i> <span>消息和任务</span>
                        <span class="pull-right-container">
                          <small class="label pull-right bg-yellow">12</small>
                          <small class="label pull-right bg-green">16</small>
                          <small class="label pull-right bg-red">5</small>
                        </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-table"></i> <span>关于我们</span>
                </a>
            </li>
            <li><a href="#"><i class="fa fa-book"></i> <span>集思广益</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
</aside>

