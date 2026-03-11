
<div class="aproval-gallery-item aproval-gallery-item-<?php echo $args['id-post']; ?>">
    <div class="aproval-gallery-item__image">
        <img src="<?php echo $args['img-post']; ?>" alt="post-aproval" />
    </div>
    <div class="aproval-gallery-item__info">
        <div class="aproval-gallery-item__title" data-title="<?php echo $args['title']; ?>">
            <h2><?php echo $args['title']; ?></h2>
        </div>
        <div class="aproval-gallery-item__data">
            <div data-id-challengue="<?php echo $args['id-challengue']; ?>">
                <div>Desafío</div>
                <span><?php echo get_the_title($args['id-challengue']); ?></span>
            </div>
            <div class="hidden" data-content="<?php echo strip_tags($args['description']); ?>">
                <div>Descripción</div>
                <p>
                    <?php echo $args['description'] ;?>
                </p>
            </div>
            <div class="hidden" data-zone-name="<?php echo $args['state-zone']->name; ?>" data-zone="<?php echo $args['state-zone']->term_id; ?>">
                <div>Estado o Zona</div>
                <span><?php echo $args['state-zone']->name; ?></span>
            </div>
            <div class="hidden" data-activity-name="<?php echo $args['turistic-destination-activity']->name; ?>" data-activity="<?php echo $args['turistic-destination-activity']->term_id; ?>">
                <div>Destino turístico o actividad</div>
                <span><?php echo $args['turistic-destination-activity']->name; ?></span>
            </div>
        </div>
        <div class="aproval-gallery-item__reject-motive">
            <div>
                Estatus o motivo por el que no se ha aprobado
            </div>
            <div>
                <?php if(!empty($args['admin-aproval-text'])): ?>
                <?php echo $args['admin-aproval-text'];?>
                <?php else: ?>
                    La imagen esta siendo revisada por el administrador
                <?php endif; ?>
            </div>
            
        </div>
        <div class="aproval-gallery-item__action">
            <button href="#upload-challengue" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-source="<?php echo $args['id-post']; ?>">
                <i class="icon-edit_square"></i>
                Editar Foto
            </button>
            <button class="aproval-gallery-item__delete" data-source="<?php echo $args['id-post']; ?>">
                <i class="icon-delete"></i>
                Eliminar Foto
            </button>
        </div>
    </div>
</div>