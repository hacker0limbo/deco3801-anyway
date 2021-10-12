<div class="container" id="checker-with-api" @mounted="mounted">
  <div class="bs-stepper">
    <div class="bs-stepper-header" role="tablist">
      <!-- your steps here -->
      <div class="step" data-target="#info-part">
        <button type="button" class="step-trigger" role="tab" aria-controls="info-part" id="info-part-trigger">
          <span class="bs-stepper-circle">1</span>
          <span class="bs-stepper-label">Personal Information</span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step" data-target="#symptoms-part">
        <button type="button" class="step-trigger" role="tab" aria-controls="symptoms-part" id="symptoms-part-trigger">
          <span class="bs-stepper-circle">2</span>
          <span class="bs-stepper-label">Symptoms Chosen</span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step" data-target="#diagnosis-part">
        <button type="button" class="step-trigger" role="tab" aria-controls="diagnosis-part" id="diagnosis-part-trigger">
          <span class="bs-stepper-circle">3</span>
          <span class="bs-stepper-label">Get Diagnosis</span>
        </button>
      </div>
    </div>
    <div class="bs-stepper-content">
      <!-- your steps content here -->
      <div id="info-part" class="content fade" role="tabpanel" aria-labelledby="logins-part-trigger">
        <form onSubmit="return false;">
          <div class="form-group row my-5">
            <label for="info-year" class="col-sm-2 col-form-label">
              Year
            </label>
            <div class="col-sm-10">
              <input type="text" v-model="year" class="form-control" id="info-year" placeholder="e.g. 1982">
            </div>
          </div>

          <fieldset class="form-group row mb-5">
            <legend class="col-form-label col-sm-2 float-sm-left pt-0">
              Gender
            </legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male-option" value="Male" v-model="gender">
                <label class="form-check-label" for="male-option">
                  Male
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female-option" value="Female" v-model="gender">
                <label class="form-check-label" for="female-option">
                  Female
                </label>
              </div>
            </div>
          </fieldset>
          <button :disabled="infoInvalid" @click="infoSubmit" class="btn btn-primary float-sm-right">Next</button>
        </form>
      </div>

      <div id="symptoms-part" class="content fade" role="tabpanel" aria-labelledby="information-part-trigger">

        <div v-if="symptoms.length === 0">
          <div class="d-flex justify-content-center">
            <div class="spinner-grow text-primary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>

        <div v-else>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            You can select matched symptoms below! 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form onSubmit="return false;" class="ml-3">
            <div class="row row-cols-4">
              <div v-for="symptom in symptoms" :key="'s' + symptom.ID" class="form-check my-1" >
                <input class="form-check-input" type="checkbox" :id="'s' + symptom.ID" :value="symptom.ID" v-model="checkedSymptoms">
                <label class="form-check-label" :for="'s' + symptom.ID">
                  {{ symptom.Name }}
                </label>
              </div>
            </div>
            <button @click="symptomsPrevious" class="btn btn-primary float-sm-left my-5 ml-n3">Previous</button>
            <button :disabled="symptomsInvalid" @click="symptomsSubmit" class="btn btn-primary float-sm-right my-5">Check</button>
          </form>
        </div>

      </div>

      <div id="diagnosis-part" class="content fade" role="tabpanel" aria-labelledby="diagnosis-part-trigger">
        <div v-if="diagnosisPending">
          <div class="d-flex justify-content-center">
            <div class="spinner-grow text-primary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
        <div v-else-if="diagnosisSuccess">
          <!-- sueess alert -->
          <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            <span class="text-center">
              Successfully get diagnosis based on your selected symptoms, there could be mutiple results available in the following.
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <!-- tab content to show different issues -->
          <div class="row my-5">
            <div class="col-4">
              <div class="list-group" role="tablist">
                <a v-for="(d, index) in diagnosis" :key="'d' + d.Issue.ID" :class="{ 'active show': index === 0 }" class="list-group-item list-group-item-action" :id="'list-' + d.Issue.Name.split(' ').join('') + '-list'" data-toggle="list" :href="'#list-' + d.Issue.Name.split(' ').join('')" role="tab" :aria-controls="d.Issue.Name.split(' ').join('')">
                  {{ d.Issue.Name }}
                </a>
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content">
                <div v-for="(d, index) in diagnosis" :key="'d' + d.Issue.ID" :class="{ 'active show': index === 0 }" class="tab-pane fade" :id="'list-' + d.Issue.Name.split(' ').join('')" role="tabpanel" :aria-labelledby="'list-' + d.Issue.Name.split(' ').join('') + '-list'">

                  <div class="row">
                    <div class="col-sm-3">Name:</div>
                    <div class="col-sm-9">{{ d.Issue.Name }}</div>
                  </div>

                  <div class="row my-3">
                    <div class="col-sm-3">Icd:</div>
                    <div class="col-sm-9">{{ d.Issue.Icd }}</div>
                  </div>

                  <div class="row my-3">
                    <div class="col-sm-3">Icd Name:</div>
                    <div class="col-sm-9">{{ d.Issue.IcdName }}</div>
                  </div>

                  <div class="row my-3">
                    <div class="col-sm-3">Prof Name:</div>
                    <div class="col-sm-9">{{ d.Issue.ProfName }}</div>
                  </div>

                  <div class="row my-3">
                    <div class="col-sm-3">Ranking:</div>
                    <div class="col-sm-9">
                      <span class="badge badge-primary mt-1">
                        {{ d.Issue.Ranking }}
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3">Accuracy:</div>
                    <div class="col-sm-9">
                      <div class="progress mt-1">
                        <div class="progress-bar" role="progressbar" :style="{ width: d.Issue.Accuracy + '%' }" :aria-valuenow="d.Issue.Accuracy" aria-valuemin="0" aria-valuemax="100">
                          {{ d.Issue.Accuracy + '%' }}
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="row justify-content-between">
            <button @click="diagnosisPrevious" class="btn btn-primary my-5 ml-3">Previous</button>
            <a class="btn btn-primary my-5 mr-3" href="<?php echo base_url(); ?>checker/livechat" role="button">Live Chat</a>
          </div>

        </div>
        <div v-else>

          <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
            <span class="text-center">
              Not able to get diagnosis based on your selected symptoms, you can go back and try again, or talk with an real online doctor instead!
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="row justify-content-between">
            <button @click="diagnosisPrevious" class="btn btn-primary my-5 ml-3">Previous</button>
            <a class="btn btn-primary my-5 mr-3" href="<?php echo base_url(); ?>checker/livechat" role="button">Live Chat</a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<script>

// chinese / english
const currentLanguage = <?php echo json_encode($this->session->userdata('language')); ?> 

const checkerApiToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6InN0ZXBoZW4ueWluQG91dGxvb2suY29tIiwicm9sZSI6IlVzZXIiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9zaWQiOiI5NzMwIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy92ZXJzaW9uIjoiMjAwIiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9saW1pdCI6Ijk5OTk5OTk5OSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbWVtYmVyc2hpcCI6IlByZW1pdW0iLCJodHRwOi8vZXhhbXBsZS5vcmcvY2xhaW1zL2xhbmd1YWdlIjoiZW4tZ2IiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL2V4cGlyYXRpb24iOiIyMDk5LTEyLTMxIiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9tZW1iZXJzaGlwc3RhcnQiOiIyMDIxLTEwLTA0IiwiaXNzIjoiaHR0cHM6Ly9zYW5kYm94LWF1dGhzZXJ2aWNlLnByaWFpZC5jaCIsImF1ZCI6Imh0dHBzOi8vaGVhbHRoc2VydmljZS5wcmlhaWQuY2giLCJleHAiOjE2MzQwNjcxMzksIm5iZiI6MTYzNDA1OTkzOX0.mOWS0ZE_MTegIIyroVEGSMFA2AGuYt-LOs0FfGSTVv4'
const ckeckerApiBaseUri = 'https://sandbox-healthservice.priaid.ch'
const checkerApiConfigString = 'format=json&language=en-gb'

const translationApiBaseUri = 'https://fanyi-api.baidu.com/api/trans/vip/translate'
const translationApiAppid = '20211011000970116'
const translationApiSalt = '1435660288'
const translationApiSecret = 'fyz9ImKLYznZNPXXl4Bl'
const getTranslationApiSign = (query) => CryptoJS.MD5(`${translationApiAppid}${query}${translationApiSalt}${translationApiSecret}`).toString()

PetiteVue.createApp({

  stepper: null,
  year: '',
  gender: '',
  symptoms: [],
  // store symptom ids, [1, 2, ...]
  checkedSymptoms: [],
  diagnosis: [],
  diagnosisStatus: false,

  get infoInvalid() {
    return !(this.year.length === 4 && this.gender.length !== 0 && parseInt(this.year))
  },

  get symptomsInvalid() {
    return this.checkedSymptoms.length === 0
  },

  get diagnosisPending() {
    return this.diagnosis.length === 0 && this.diagnosisStatus === false
  },

  get diagnosisSuccess() {
    return this.diagnosis.length > 0 && this.diagnosisStatus === true
  },

  mounted() {
    // initial bootstrap step
    this.stepper = new Stepper(document.querySelector('.bs-stepper'), {
      animation: true,
    })

    const symptomsUri = `${ckeckerApiBaseUri}/symptoms?token=${checkerApiToken}&${checkerApiConfigString}`

    fetch(symptomsUri)
      .then(res => res.json())
      .then(symptoms => {
        // [{ ID: xxx, Name: yyy }, {...}]
        if (currentLanguage === 'english') {
          this.symptoms = symptoms
        } else {
          const query = symptoms.map(s => s.Name).join('\n')
          const sign = getTranslationApiSign(query)

          $.ajax({
            url: translationApiBaseUri,
            type: 'get',
            // use context to access vue this
            context: this,
            dataType: 'jsonp',
            data: {
              q: query,
              appid: translationApiAppid,
              salt: translationApiSalt,
              from: 'en',
              to: 'zh',
              sign,
            },
            success({ trans_result }) {
              const translatedSymptoms = symptoms.map(({ ID, Name }) => {
                const t = trans_result.find(({ src, dst }) => src === Name)
                return { ID, Name: t.dst }
              })
              this.symptoms = translatedSymptoms
            },
            err(e) {
              console.log(e)
            }
          })
        }
      })
      .catch(err => {
        console.log(err)
      })
  },

  infoSubmit(e) {
    console.log('info', this.year, this.gender)
    this.stepper.next()
  },

  symptomsPrevious(e) {
    this.stepper.previous()
  },

  symptomsSubmit(e) {
    console.log('symptoms', this.checkedSymptoms)
    this.stepper.next()

    const diagnosisUri = `${ckeckerApiBaseUri}/diagnosis?symptoms=[${this.checkedSymptoms.toString()}]&gender=${this.gender}&year_of_birth=${this.year}&token=${checkerApiToken}&${checkerApiConfigString}`

    fetch(diagnosisUri)
      .then(res => res.json())
      .then(diagnosis => {
        console.log('diagnosis', diagnosis)
        if (diagnosis.length === 0) {
          this.diagnosisStatus = true
        } else {
          if (currentLanguage === 'english') {
            this.diagnosis = diagnosis
            this.diagnosisStatus = true
          } else {
            const query = diagnosis.map(d => `${d.Issue.Name}\n${d.Issue.IcdName}\n${d.Issue.ProfName}`).join('\n')
            const sign = getTranslationApiSign(query)

            $.ajax({
              url: translationApiBaseUri,
              type: 'get',
              // use context to access vue this
              context: this,
              dataType: 'jsonp',
              data: {
                q: query,
                appid: translationApiAppid,
                salt: translationApiSalt,
                from: 'en',
                to: 'zh',
                sign,
              },
              success({ trans_result }) {
                const translatedDiagnosis = diagnosis.map(({ Issue, Specialisation }) => {
                  const tName = trans_result.find(({ src, dst }) => src === Issue.Name)
                  const tIcdName = trans_result.find(({ src, dst }) => src === Issue.IcdName)
                  const tProfName = trans_result.find(({ src, dst }) => src === Issue.ProfName)

                  return {
                    ...Specialisation,
                    Issue: {
                      ...Issue,
                      Name: tName.dst,
                      IcdName: tIcdName.dst,
                      ProfName: tProfName.dst,
                    }
                  }

                })
                this.diagnosis = translatedDiagnosis
                this.diagnosisStatus = true
              },
              err(e) {
                console.log(e)
              }
            })
          }
        }
      })
      .catch(err => {
        console.log(err)
      })

  },

  diagnosisPrevious(e) {
    // reset diagnosis status and diagnosis result
    this.diagnosisStatus = false
    this.diagnosis = []
    this.stepper.previous()
  }

}).mount('#checker-with-api')


</script>