<div>

    {{-- مضمون الرسالة لو مش فاضية اعرضها
        وتم تعريف
        public $successMessage = '';
        في
        addParent.php
        --}}

    @if (!empty($successMessage))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $successMessage }}
</div>
@endif



@if ($catchError)
<div class="alert alert-danger" id="success-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ $catchError }}
</div>
@endif

{{--
حتى تأتي القائمة التالية بشكل افقي تم تضمين ملف
css   css/wizard.css   to -- resources\views\layouts\head
وهذا الف موجود في
public\css\wizard.css--}}


@if($show_table)
    @include('livewire.Parent_Table')
@else

 <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                   class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('Parent_trans.Step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                   class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('Parent_trans.Step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                   class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                   disabled="disabled">3</a>
                <p>{{ trans('Parent_trans.Step3') }}</p>
            </div>
        </div>
    </div>



{{-- حتى لا تكبر الصفحة كثيرا تم عمل صفحتين التاليتين بشكل مستقل
فقط لتنظيم العمل وسهولة الوصول للكود
وتم استدعاء الصفحتين --}}

    @include('livewire.Father_Form')

    @include('livewire.Mother_Form')

    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
        @endif

           <div class="col-xs-12">
               <div class="col-md-12"><br>
                   <label style="color: red">{{trans('Parent_trans.Attachments')}}</label>


                  {{-- -- -- upload -- -- --}}
                   <div class="form-group">
                       <input type="file" wire:model="photos" accept="image/*" multiple>
                       {{-- لو بنشتغل بالطريقة العادية يعني مش livewire
                       بنكتب
                       name="photos"
                       بعد
                       model="photos"--}}
                   </div>
                   <br>

                   <input type="hidden" wire:model="Parent_id">

                   <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                           wire:click="back(2)">{{ trans('Parent_trans.Back') }}</button>

                           @if($updateMode)
                           <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="submitForm_edit"
                                   type="button">{{trans('Parent_trans.Finish')}}
                           </button>
                       @else
                           <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                                   type="button">{{ trans('Parent_trans.Finish') }}</button>
                       @endif

               </div>
           </div>

           @endif
       </div>



