import InputError from '@/components/input-error';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Select,
    SelectTrigger,
    SelectValue,
    SelectContent,
    SelectItem,
} from '@/components/ui/select';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, router, useForm } from '@inertiajs/react';
import { useState } from 'react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Hhome',
        href: '/',
    },
    {
        title: 'Permissions',
        href: '/permissions',
    },
    {
        title: 'Create',
        href: '/permissions/create',
    },
];

interface LectTypeData {
    id: number;
    parent_id: number;
    full_name: string;
    medium_name: string;
    short_name: string;
}

interface GroupData {
    id: number;
    parent_id: number;
    full_name: string;
    medium_name: string;
    short_name: string;
}
interface Subject {
    id: number;
    parent_id: number;
    full_name: string;
    medium_name: string;
    short_name: string;
    teachers: Teacher[];
}
interface Teacher {
    id: number;
    teacher_name: string;
    subject_id: number; // <- needed for dependent dropdown
}

interface ProfYear {
    id: number;
    parent_id: number;
    full_name: string;
    medium_name: string;
    short_name: string;
    prof_year_subjects: Subject[];
}

interface ProfYearSession {
    id: number;
    prof_year_id: number;
    start_date: string;
    end_date: string;
    prof_year: ProfYear;

}


interface CreateProps {
    profYearSessions: ProfYearSession[];
    lectTypeDatas: LectTypeData[];
    groupDatas: GroupData[];    
}

const Create: React.FC<CreateProps> = ({
    profYearSessions,
    lectTypeDatas,
    groupDatas,    

}) => {

    console.log(profYearSessions)

    const [selectedProfYearSession, setSelectedProfYearSession] = useState<ProfYearSession | null>(null);

    const { data, setData, errors, post, processing } = useForm({
        class_date: '',
        start_time: '',
        end_time: '',
        prof_year_session_id: '',
        lecture_type_id: '',
        group_id: '',
        subject_id: '',
        teacher_id: '',
        class_topic: '',
        teaching_method: '',
        tools_used: '',
        assesment_method: '',
    });

    const handleSubmit: React.FormEventHandler<HTMLFormElement> = (e) => {
        e.preventDefault();

        post(route("acadClassSchedules.store"));
    };

    // Filter subject and teachers based on selected subject
    const filteredSubjects = selectedProfYearSession?.prof_year.prof_year_subjects ?? [];

    const filteredTeachers =
        filteredSubjects.find((s) => s.id === Number(data.subject_id))?.teachers ?? [];

    console.log(profYearSessions)


    return (

        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Permissions Create" />

            <div className="flex items-center justify-between mb-6">
                <Link
                    className="px-6 py-2 text-white bg-green-500 rounded-md focus:outline-none"
                    href={route("acadClassSchedules.index")}
                >
                    Back acadClassSchedules
                </Link>
            </div>

            <form name="createForm" onSubmit={handleSubmit} noValidate>
                <div className="flex flex-col">
                    {/* class_date */}
                    <div className="grid gap-2">
                        <Label htmlFor="class_date">Class Date</Label>
                        <Input
                            id="class_date"
                            type="date"
                            required
                            autoFocus
                            tabIndex={1}
                            autoComplete="class_date"
                            value={data.class_date}
                            onChange={(e) => setData('class_date', e.target.value)}
                            disabled={processing}
                            placeholder="Full name"
                        />
                        <InputError message={errors.class_date} className="mt-2" />
                    </div>
                    {/* start_time */}
                    <div className="grid gap-2">
                        <Label htmlFor="start_time">Start Time</Label>
                        <Input
                            id="start_time"
                            type="time"
                            required
                            value={data.start_time}
                            onChange={(e) => setData('start_time', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.start_time} />
                    </div>

                    {/* end_time */}
                    <div className="grid gap-2">
                        <Label htmlFor="end_time">End Time</Label>
                        <Input
                            id="end_time"
                            type="time"
                            required
                            value={data.end_time}
                            onChange={(e) => setData('end_time', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.end_time} />
                    </div>

                    {/* prof_year_session_id */}
                    <div className="grid gap-2">
                        <Label htmlFor="prof_year_session_id">Prof Year Session</Label>
                        <Select
                            value={data.prof_year_session_id}
                            onValueChange={(value) => {
                                setData('prof_year_session_id', value);
                                const selected = profYearSessions.find((s) => s.id === Number(value));
                                setSelectedProfYearSession(selected ?? null);
                                setData('subject_id', '');
                                setData('teacher_id', '');
                            }}
                        >
                            <SelectTrigger>
                                <SelectValue placeholder="Select session" />
                            </SelectTrigger>
                            <SelectContent>
                                {profYearSessions.map((session) => (
                                    <SelectItem key={session.id} value={String(session.id)}>
                                        {session.prof_year.full_name} ({session.start_date} - {session.end_date})
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.prof_year_session_id} />
                    </div>

                    {/* lecture_type_id */}
                    <div className="grid gap-2">
                        <Label htmlFor="lecture_type_id">Lecture Type</Label>
                        <Select
                            value={String(data.lecture_type_id)}
                            onValueChange={(value) => setData("lecture_type_id", value)}
                        >
                            <SelectTrigger>
                                <SelectValue placeholder="Select Lecture Type" />
                            </SelectTrigger>
                            <SelectContent>
                                {lectTypeDatas.map((lectureType) => (
                                    <SelectItem key={lectureType.id} value={String(lectureType.id)}>
                                        {lectureType.full_name}
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.lecture_type_id} />
                    </div>

                    {/* group_id */}
                    <div className="grid gap-2">
                        <Label htmlFor="group_id">Group</Label>
                        <Select
                            value={String(data.group_id)}
                            onValueChange={(value) => setData('group_id', value)}
                        >
                            <SelectTrigger>
                                <SelectValue placeholder="Select group" />
                            </SelectTrigger>
                            <SelectContent>
                                {groupDatas.map((group) => (
                                    <SelectItem key={group.id} value={String(group.id)}>
                                        {group.full_name}
                                    </SelectItem>
                                ))}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.group_id} />
                    </div>
                    {/* subject_id */}
                    <div className="grid gap-2">
                        <Label htmlFor="subject_id">Subject</Label>
                        <Select
                            value={String(data.subject_id)}
                            onValueChange={(value) => {
                                setData('subject_id', value);
                                setData('teacher_id', ''); // reset teacher
                            }}
                        >
                            <SelectTrigger>
                                <SelectValue placeholder="Select subject" />
                            </SelectTrigger>
                            <SelectContent>
                                {filteredSubjects.length > 0 ? (
                                    filteredSubjects.map((subject) => (
                                        <SelectItem key={subject.id} value={String(subject.id)}>
                                            {subject.full_name}
                                        </SelectItem>
                                    ))
                                ) : (
                                    <SelectItem disabled value="no-subjects">No subjects available</SelectItem>
                                )}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.subject_id} />
                    </div>
                    {/* teacher_id */}
                    <div className="grid gap-2">
                        <Label htmlFor="teacher_id">Teacher Name</Label>
                        <Select
                            value={String(data.teacher_id)}
                            onValueChange={(value) => setData('teacher_id', value)}
                            disabled={!data.subject_id}
                        >
                            <SelectTrigger>
                                <SelectValue placeholder="Select teacher" />
                            </SelectTrigger>
                            <SelectContent>
                                {filteredTeachers.length > 0 ? (
                                    filteredTeachers.map((teacher) => (
                                        <SelectItem key={teacher.id} value={String(teacher.id)}>
                                            {teacher.teacher_name}
                                        </SelectItem>
                                    ))
                                ) : (
                                    <div className="px-4 py-2 text-sm text-muted-foreground">
                                        No teachers available
                                    </div>
                                )}
                            </SelectContent>
                        </Select>
                        <InputError message={errors.teacher_id} />
                    </div>
                    {/* class_topic */}
                    <div className="grid gap-2">
                        <Label htmlFor="class_topic">Class Topic</Label>
                        <Input
                            id="class_topic"
                            type="text"
                            value={data.class_topic}
                            onChange={(e) => setData('class_topic', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.class_topic} />
                    </div>
                    {/* teaching_method */}
                    <div className="grid gap-2">
                        <Label htmlFor="teaching_method">Teaching Method</Label>
                        <Input
                            id="teaching_method"
                            type="text"
                            value={data.teaching_method}
                            onChange={(e) => setData('teaching_method', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.teaching_method} />
                    </div>
                    {/* tools_used */}
                    <div className="grid gap-2">
                        <Label htmlFor="tools_used">Tools Used</Label>
                        <Input
                            id="tools_used"
                            type="text"
                            value={data.tools_used}
                            onChange={(e) => setData('tools_used', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.tools_used} />
                    </div>

                    {/* assesment_method */}
                    <div className="grid gap-2">
                        <Label htmlFor="tools_used">Assesment Method</Label>
                        <Input
                            id="assesment_method"
                            type="text"
                            value={data.assesment_method}
                            onChange={(e) => setData('assesment_method', e.target.value)}
                            disabled={processing}
                        />
                        <InputError message={errors.assesment_method} />
                    </div>



                </div>


                <div className="mt-4">
                    <button
                        type="submit"
                        className="px-6 py-2 font-bold text-white bg-green-500 rounded"
                    >
                        Save
                    </button>
                </div>
            </form>












        </AppLayout>
    );
};


export default Create;






