<template>
    <div class="modal fade" :id="id" tabindex="-1" role="dialog" :aria-labelledby="id" aria-hidden="true" style="padding-top: 200px;">
        <div :class="['modal-dialog modal-dialog-centered', size ? 'modal-'+size : '']" role="document">
            <div class="modal-content">
                <div :class="['modal-header', modalHeaderClass]">
                    <slot name="modal-header">
                        <h5 class="modal-title">{{ title }}</h5>                    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </slot>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <button v-if="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">{{ cancel }}</button>
                    <template v-if="ok">
                        <button v-if="submit" type="button" class="btn btn-primary" @click.prevent="submit">{{ ok }}</button>
                        <button v-else type="button" class="btn btn-primary" data-dismiss="modal">{{ ok }}</button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {  
    name: "Modal",  
    data() {
        return {id: "test"}
    },
    props: [id, size, title, ok, cancel, submit, modalHeaderClass]
    // props: {
    //     id:     { type: String, default: 'modal-id' },
    //     size:   { type: String },
    //     title:  { type: String },
    //     ok:     { type: [String, Boolean], default: "Valider" },
    //     cancel: { type: [String, Boolean], default: "Annuler" },
    //     submit: { type: Function },
    //     modalHeaderClass: { type: String },
    // },
}

<script>