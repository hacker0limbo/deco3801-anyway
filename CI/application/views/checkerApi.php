<div class="container" id="checker-with-api" @mounted="mounted">
  <div class="bs-stepper">
    <div class="bs-stepper-header" role="tablist">
      <!-- your steps here -->
      <div class="step" data-target="#info-part">
        <button type="button" class="step-trigger" role="tab" aria-controls="info-part" id="info-part-trigger">
          <span class="bs-stepper-circle">1</span>
          <span class="bs-stepper-label">{{ staticContent.infoPart.personalInfo }}</span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step" data-target="#symptoms-part">
        <button type="button" class="step-trigger" role="tab" aria-controls="symptoms-part" id="symptoms-part-trigger">
          <span class="bs-stepper-circle">2</span>
          <span class="bs-stepper-label">{{ staticContent.symptomsPart.symptomsChosen }}</span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step" data-target="#diagnosis-part">
        <button type="button" class="step-trigger" role="tab" aria-controls="diagnosis-part" id="diagnosis-part-trigger">
          <span class="bs-stepper-circle">3</span>
          <span class="bs-stepper-label">{{ staticContent.diagnosisPart.diagnosisResult }}</span>
        </button>
      </div>
    </div>
    <div class="bs-stepper-content">
      <!-- your steps content here -->
      <div id="info-part" class="content fade" role="tabpanel" aria-labelledby="info-part-trigger">
        <form onSubmit="return false;">
          <div class="form-group row my-5">
            <label for="info-year" class="col-sm-2 col-form-label">
              {{ staticContent.infoPart.year }}
            </label>
            <div class="col-sm-10">
              <input type="text" v-model="year" class="form-control" id="info-year" placeholder="e.g. 1982">
            </div>
          </div>

          <fieldset class="form-group row mb-5">
            <legend class="col-form-label col-sm-2 float-sm-left pt-0">
              {{ staticContent.infoPart.gender }}
            </legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male-option" value="Male" v-model="gender">
                <label class="form-check-label" for="male-option">
                  {{ staticContent.infoPart.male }}
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female-option" value="Female" v-model="gender">
                <label class="form-check-label" for="female-option">
                  {{ staticContent.infoPart.female }}
                </label>
              </div>
            </div>
          </fieldset>
          <button :disabled="infoInvalid" @click="infoSubmit" class="btn btn-primary float-sm-right">
            {{ staticContent.global.next }}
          </button>
        </form>
      </div>

      <div id="symptoms-part" class="content fade" role="tabpanel" aria-labelledby="symptoms-part-trigger">

        <div v-if="symptoms.length === 0">
          <div class="d-flex justify-content-center">
            <div class="spinner-grow text-primary" role="status">
              <span class="sr-only">{{ staticContent.global.loading }}</span>
            </div>
          </div>
        </div>

        <div v-else>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ staticContent.symptomsPart.alert }}
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
            <button @click="symptomsPrevious" class="btn btn-primary float-sm-left my-5 ml-n3">
              {{ staticContent.global.previous }}
            </button>
            <button :disabled="symptomsInvalid" @click="symptomsSubmit" class="btn btn-primary float-sm-right my-5">
              {{ staticContent.global.check }}
            </button>
          </form>
        </div>

      </div>

      <div id="diagnosis-part" class="content fade" role="tabpanel" aria-labelledby="diagnosis-part-trigger">
        <div v-if="diagnosisPending">
          <div class="d-flex justify-content-center">
            <div class="spinner-grow text-primary" role="status">
              <span class="sr-only">{{ staticContent.global.loading }}</span>
            </div>
          </div>
        </div>
        <div v-else-if="diagnosisSuccess">
          <!-- sueess alert -->
          <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            <span class="text-center">
              {{ staticContent.diagnosisPart.successAlert }}
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
                    <div class="col-sm-3">{{ staticContent.diagnosisPart.issueName }}:</div>
                    <div class="col-sm-9">{{ d.Issue.Name }}</div>
                  </div>

                  <div class="row my-3">
                    <div class="col-sm-3">{{ staticContent.diagnosisPart.icd }}:</div>
                    <div class="col-sm-9">{{ d.Issue.Icd }}</div>
                  </div>

                  <div class="row my-3">
                    <div class="col-sm-3">{{ staticContent.diagnosisPart.icdName }}:</div>
                    <div class="col-sm-9">{{ d.Issue.IcdName }}</div>
                  </div>

                  <div class="row my-3">
                    <div class="col-sm-3">{{ staticContent.diagnosisPart.profName }}:</div>
                    <div class="col-sm-9">{{ d.Issue.ProfName }}</div>
                  </div>

                  <div class="row my-3">
                    <div class="col-sm-3">{{ staticContent.diagnosisPart.ranking }}:</div>
                    <div class="col-sm-9">
                      <span class="badge badge-primary mt-1">
                        {{ d.Issue.Ranking }}
                      </span>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3">{{ staticContent.diagnosisPart.accuracy }}:</div>
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
            <button @click="diagnosisPrevious" class="btn btn-primary my-5 ml-3">
              {{ staticContent.global.previous }}
            </button>
            <a class="btn btn-primary my-5 mr-3" href="<?php echo base_url(); ?>checker/livechat" role="button">
              {{ staticContent.global.liveChat }}
            </a>
          </div>

        </div>
        <div v-else>

          <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
            <span class="text-center">
              {{ staticContent.diagnosisPart.failureAlert }}
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="row justify-content-between">
            <button @click="diagnosisPrevious" class="btn btn-primary my-5 ml-3">
              {{ staticContent.global.previous }}
            </button>
            <a class="btn btn-primary my-5 mr-3" href="<?php echo base_url(); ?>checker/livechat" role="button">
              {{ staticContent.global.liveChat }}
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<script>

// chinese / english
const currentLanguage = <?php echo json_encode($this->session->userdata('language')); ?> 
const isEnglish = currentLanguage === 'english'

const checkerApiConfig = {
  authUri: 'https://sandbox-authservice.priaid.ch',
  baseUri: 'https://sandbox-healthservice.priaid.ch',
  configString: 'format=json&language=en-gb',
  username: 'stephen.yin@outlook.com',
  hashedCredentials: 'PiFn2RrPCyyoeeY4qjS50g==',
}

const translationApiBaseUri = 'https://fanyi-api.baidu.com/api/trans/vip/translate'
const translationApiAppid = '20211011000970116'
const translationApiSalt = '1435660288'
const translationApiSecret = 'fyz9ImKLYznZNPXXl4Bl'
const getTranslationApiSign = (query) => CryptoJS.MD5(`${translationApiAppid}${query}${translationApiSalt}${translationApiSecret}`).toString()

PetiteVue.createApp({

  stepper: null,
  // static content for language conditional rendering
  staticContent: {
    global: {
      loading: isEnglish ? 'Loading...' : '加载中...',
      previous: isEnglish ? 'Previous' : '上一步',
      next: isEnglish ? 'Next' : '下一步',
      check: isEnglish ? 'Check' : '诊断',
      liveChat: isEnglish ? 'Live Chat' : '实时聊天',
    },
    infoPart: {
      personalInfo: isEnglish ? 'Personal Information' : '个人信息',
      year: isEnglish ? 'Year' : '出身年份',
      gender: isEnglish ? 'Gender' : '性别',
      male: isEnglish ? 'Male' : '男',
      female: isEnglish ? 'Female' : '女',
    },
    symptomsPart: {
      symptomsChosen: isEnglish ? 'Symptoms Chosen' : '症状选择',
      alert: isEnglish ? 'You can select matched symptoms below!' : '请选择以下匹配的的症状',
    },
    diagnosisPart: {
      diagnosisResult: isEnglish ? 'Diagnosis Result': '诊断结果',
      successAlert: isEnglish 
        ? 'Successfully get diagnosis based on your selected symptoms, there could be mutiple results available in the following.' 
        : '成功根据您选择的症状得到诊断结果, 诊断结果可能存在多个',
      issueName: isEnglish ? 'Name' : '疾病名字',
      icd: isEnglish ? 'Icd' : '国家疾病分类编号',
      icdName: isEnglish ? 'Icd Name' : '国家疾病分类名称',
      profName: isEnglish ? 'Prof Name' : '专业名称',
      ranking: isEnglish ? 'Ranking' : '诊断排名',
      accuracy: isEnglish ? 'Accuracy' : '诊断准确率',
      failureAlert: isEnglish 
        ? 'Not able to get diagnosis based on your selected symptoms, you can go back and try again, or talk with an real online doctor instead!'
        : '根据您选择的症状获取诊断结果失败, 您可以返回重新尝试或直接向我们的在线客服咨询!',

    },
  },
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

    fetch(`${checkerApiConfig.authUri}/login`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${checkerApiConfig.username}:${checkerApiConfig.hashedCredentials}`
      },
    })
      .then(res => res.json())
      .then(({ Token }) => {
        const symptomsUri = `${checkerApiConfig.baseUri}/symptoms?token=${Token}&${checkerApiConfig.configString}`

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

      })
      .catch(err => console.log(err))

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

    fetch(`${checkerApiConfig.authUri}/login`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${checkerApiConfig.username}:${checkerApiConfig.hashedCredentials}`
      },
    })
      .then(res => res.json())
      .then(({ Token }) => {
        const diagnosisUri = `${checkerApiConfig.baseUri}/diagnosis?symptoms=[${this.checkedSymptoms.toString()}]&gender=${this.gender}&year_of_birth=${this.year}&token=${Token}&${checkerApiConfig.configString}`

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
        })

      .catch(err => console.log(err))
  },

  diagnosisPrevious(e) {
    // reset diagnosis status and diagnosis result
    this.diagnosisStatus = false
    this.diagnosis = []
    this.stepper.previous()
  }

}).mount('#checker-with-api')


</script>